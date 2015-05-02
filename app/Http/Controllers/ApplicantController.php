<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

//Namespace for accepting requests
use Illuminate\Support\Facades\Request;
use App\Applicant;
use App\Course;
use App\Applicant_Course;

//use Illuminate\Http\Request;

class ApplicantController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
    	return view('applicant/home');
    }

    public function home()
    {
    	return view('applicant/home');
    }

    public function form()
    {
    	 $courses = Course::all()->toArray();

        return view('applicant/form', ['courses' => $courses]);
    }

    public function formStore()
    {
    	$input = Request::all();

        $user = \Auth::user()->toArray();

        if ($input['studentStatus'] == 'Und') {
            $program = $input['studentStatus'] . " " . $input['studentMajor'] . " "
                . $input['studentField'] . " " . $input['studentYear'];
            $GPA = $input['studentGPA'];
        } else {
            $program = $input['studentStatus'];
            $GPA = null;
        }

        $speakscore = ($input['studentOpt'] != "") ? $input['studentOpt'] : 0;

        $speakdate = ($input['speakDate'] != "") ? $input['speakDate'] : null;

        $work = (count($input['studentWork']) > 0) ? "" : null;

        foreach ($input['studentWork'] as $studentWork) {
            if ( strlen($work) > 0 ) {
                $work = $work . ',' . $studentWork;
            } else {
                $work = $studentWork;
            }
        }    

        Applicant::create([
            'sso' => $user['sso'],
            'name' => $user['name'],
            'email' => $user['email'],
            'phone' => $input['studentPhone'],
            'gpa' => $GPA,
            'graddate' => $input['gradDate'],
            'program' => $program,
            'previouswork' => $work,
            'speakscore' => $speakscore,
            'speakdate' => $speakdate
        ]);

        foreach ($input['prevTaught'] as $prev) {
            Applicant_Course::create([
                'sso' => $user['sso'],
                'courseid' => $prev,
                'action' => "100"
            ]);
        }
        foreach ($input['currTaught'] as $curr) {
            Applicant_Course::create([
                'sso' => $user['sso'],
                'courseid' => $curr,
                'action' => "010"
            ]);
        }
        foreach ($input['likeTeach'] as $like) {
            Applicant_Course::create([
                'sso' => $user['sso'],
                'courseid' => $like,
                'action' => "001",
                'recommendation' => 0
            ]);
        }

        return "It worked " . serialize($input) . "!";
    }

}
