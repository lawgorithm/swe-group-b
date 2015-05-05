<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Applicant_offer;
use App\Http\Controllers\Controller;

//Namespace for accepting requests
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Applicant;
use App\Course;
use App\Applicant_Course;
use App\Phase;
use Illuminate\Support\Facades\Mail;
use Session;
use Redirect;
use Laracasts\Flash\Flash;

//use Illuminate\Http\Request;

class ApplicantController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
        $this->middleware('time', ['except' => ['index', 'about', 'home', 'accepted', 'accepted']]);
    }

    public function about()
    {
        return view('applicant/about');
    }

    public function home()
    {
        $applicantName = \Auth::user()->name;
        $phase = new Phase();
        $phase = $phase->getPhaseData();

        date_default_timezone_set('America/Chicago');
        $curDate = getdate();
        $curDate = $curDate[0];

        $phaseOpen = $phase["open"];
        $phaseTransition = $phase["transition"];
        $phaseClose = $phase["close"];

        $phaseOpen = strtotime($phaseOpen);
        $phaseTransition = strtotime($phaseTransition);
        $phaseClose = strtotime($phaseClose);

        $message = "Applications are now closed!";

        if( $curDate >= $phaseOpen && $curDate < $phaseTransition ) {
            $message = "Applications are open!";
        } else if ( $curDate > $phaseTransition && $curDate < $phaseClose ) {
            $message = "Applications are closed, ";
            if (!Applicant::checkIfSubmitted(\Auth::user()->sso))
                $message = $message . "come back next year.";
            else
                $message = $message . "offers pending.";
        } else {
            $message = "TA applications will open sometime I guess.";
        }

        return view('applicant/home', ['name' => $applicantName, 'message' => $message]);    }

    public function form()
    {
    	$courses = Course::all()->toArray();

        if (Applicant::checkIfSubmitted(Auth::user()->sso)){
            Flash::error('You have already submitted an application!');
            return redirect('applicant/home');
        }

        return view('applicant/form', ['courses' => $courses]);
    }

    public function formStore()
    {
    	$input = Request::all();

        $user = \Auth::user()->toArray();

        $speakscore = ($input['studentOpt'] != "") ? $input['studentOpt'] : 0;

        $speakdate = ($input['speakDate'] != "") ? $input['speakDate'] : null;

        $work = (count($input['studentWork']) > 0) ? "" : null;

        foreach ($input['studentWork'] as $studentWork) {
            if ( strlen($work) > 0 ) {
                $work = $work . ', ' . $studentWork;
            } else {
                $work = $studentWork;
            }
        }    

        $validArray = [
            'phone' => $input['studentPhone'],
            'gpa' => $input['studentGPA'],
            'graddate' => $input['gradDate'],
            'mode' => $input['studentStatus'],
            'major' => $input['studentMajor'],
            'field' => $input['studentField'],
            'year' => $input['studentYear'],
            'work' => $work,
            'speakscore' => $speakscore,
            'speakdate' => $speakdate,
            'prevtaught' => $input['prevTaught'],
            'currtaught' => $input['currTaught'],
            'liketeach' => $input['likeTeach'],
        ];

        $badMessage = validInput( $validArray );
        if ( $badMessage != "" ) {
            Session::flash('Validation_Error', $badMessage);
            return Redirect::to('applicant/form');
        }

        Applicant::create([
            'sso' => $user['sso'],
            'name' => $user['name'],
            'email' => $user['email'],
            'phone' => $validArray['phone'],
            'gpa' => $validArray['gpa'],
            'graddate' => $validArray['graddate'],
            'program' => $validArray['program'],
            'previouswork' => $validArray['work'],
            'speakscore' => $validArray['speakscore'],
            'speakdate' => $validArray['speakdate']
        ]);


        foreach ($input['prevTaught'] as $prev) {
            if ($prev != "")
                Applicant_Course::create([
                    'sso' => $user['sso'],
                    'courseid' => $prev,
                    'action' => "100"
                ]);
        }
        foreach ($input['currTaught'] as $curr) {
            if ($curr != "")
                Applicant_Course::create([
                    'sso' => $user['sso'],
                    'courseid' => $curr,
                    'action' => "010"
                ]);
        }
        foreach ($input['likeTeach'] as $like) {
          if ($like != "")
                Applicant_Course::create([
                    'sso' => $user['sso'],
                    'courseid' => $like,
                    'action' => "001",
                    'recommendation' => 0
                ]);
        }

        Flash::success('You have successfully submitted an application!');
        return redirect('applicant/home');
    }

    public function accepted(){
        $sso = \Auth::user()->sso;
        $offers = new Applicant_offer();
        $offers = $offers->getOfferedCourseBySSO($sso);

        return view('applicant/accepted', ['offers' => $offers]);
    }

    public function updateAccepted(){

        $email = $_POST['email'];
        $course = $_POST['course'];
        $name = $_POST['name'];
        $sso = $_POST['sso'];

        if(isset($_POST['yesBtn']))
            $offerResponse = $_POST['yesBtn'];
        else if(isset($_POST['noBtn']))
            $offerResponse = $_POST['noBtn'];

        $applicant = array(
            'course' => $course,
            'sso' => $sso,
        );

        if($offerResponse == "yes") {
            $data = ['email'=>$email, 'name' => $name];

            Mail::send('emails.responseYes', $data, function ($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('jake.august.parham@gmail.com')->subject('RE: TA Position Job Offer!');
            });
        }
        else if($offerResponse == "no") {
            $data = ['email'=>$email, 'name'=>$name];

            Mail::send('emails.responseNo', $data, function ($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('jake.august.parham@gmail.com')->subject('RE: TA Position Job Offer!');
            });
        }

        $appOffer = new Applicant_offer();
        $appOffer->updateOfferAccepted($applicant);

        return Redirect::to('applicant/accepted');

    }

}
