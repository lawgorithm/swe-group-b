<?php namespace App\Http\Controllers;

use App\Applicant;
use App\Applicant_Course;
use App\Course;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class InstructorController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Instructor Controller
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
        $this->middleware('time', ['except' => ['home']]);
    }

    public function index()
    {
        $courses = new Course();
        $courses = $courses->getAllCourses();

        return view('course', ['courses' => $courses]);
    }

    public function home()
    {
        $instructorName = \Auth::user()->name;

    	return view('instructor/home', ['instructorName' => $instructorName]);
    }

    public function redirectCourse()
    {
        $courseId = $_POST['course-list'];
        return redirect("instructor/feedback/$courseId");
    }

    public function showApplicants($id)
    {
        $applicants = new Applicant();
        $recommended = new Applicant();
        $applicants = $applicants->getApplicantsByCourseId($id);
        $recommended = $recommended->getRecommendedByCourseId($id);

        return view('instructor/feedback', ['applicants' => $applicants, 'recommended' => $recommended]);
    }

    public function feedbackStore()
    {
        if (Session::token() !== Input::get('_token')) {
            return Response::json(array(
                'msg' => 'Unauthorized attempt to create setting'
            ));
        }

        $appCourse = new Applicant_Course();
        $sso = $this->feedback_form_sanitizer(Input::get('sso'));
        $courseid = $this->feedback_form_sanitizer(Input::get('courseid'));
        $feedback = $this->feedback_form_sanitizer(Input::get('feedback'));
        $options = $this->feedback_form_sanitizer(Input::get('option'));
        $name = $this->feedback_form_sanitizer(Input::get('username'));

        $ssoErr = $this->feedback_form_validate($sso);
        $cidErr = $this->feedback_form_validate($courseid);
        $fbkErr = $this->feedback_form_validate($feedback);
        $optErr = $this->feedback_form_validate($options);

        if($ssoErr == false && $cidErr == false && $fbkErr == false && $optErr == false) {
            $applicant = $this->applicantInfo_toArray($sso, $courseid, $feedback, $options);
            $appCourse->updateApplicantFeedback($applicant);

            $response = array(
                'status' => 'success',
                'msg' => 'Update was successful',
            );
        } else {
            $response = array(
                'status' => 'failure',
                'msg' => 'Something went wrong updating this data'
            );
        }

        return Response::json($response);
    }

    public function feedback_form_validate($data){

        $err = false;
        if(empty($data))
        {
            $err = true;
        }
        return $err;
    }

    public function feedback_form_sanitizer($data){
        $data = htmlspecialchars($data);
        $data = pg_escape_string($data);

        return $data;
    }

    public function applicantInfo_toArray($sso, $courseid, $feedback, $options)
    {
        $applicant = array();

        array_push($applicant, $sso);
        array_push($applicant, $courseid);
        array_push($applicant, $feedback);
        array_push($applicant, $options);

        return $applicant;
    }
}
