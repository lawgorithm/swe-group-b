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

    private $err = false;
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
    }

    public function index()
    {
        $courses = new Course();
        $courses = $courses->getAllCourses();

        return view('course', ['courses' => $courses]);
    }

    public function home()
    {
    	return view('instructor/home');
    }

    public function redirectCourse()
    {
        $courseId = $_POST['course-list'];
        return redirect("instructor/feedback/$courseId");
    }

    public function showApplicants($id)
    {
        $applicants = new Applicant();
        $applicants = $applicants->getApplicantsByCourseId($id);

        return view('instructor/feedback', ['applicants' => $applicants]);
    }

    public function feedbackStore()
    {
        if (Session::token() !== Input::get('_token')) {
            return Response::json(array(
                'msg' => 'Unauthorized attempt to create setting'
            ));
        }

        $appCourse = new Applicant_Course();
        $sso = Input::get('sso');
        $courseid = Input::get('courseid');
        $feedback = Input::get('feedback');
        $options = Input::get('option');

        $this->check_for_errors($sso, $courseid, $feedback, $options);

        if($this->err == false) {
            $applicant = $this->applicantInfo_toArray($sso, $courseid, $feedback, $options);
            $appCourse->updateApplicantFeedback($applicant);

            $response = array(
                'status' => 'success',
                'msg' => 'Feedback given successfully',
            );
        } else {
            $response = array(
                'status' => 'failure',
                'msg' => 'Feedback given unsuccessful'
            );
        }

        return Response::json($response);
    }

    public function feedback_form_validate($data){

        $err = false;
        if(!isset($data))
        {
            $err = true;
        }
        return $err;
    }

    public function check_for_errors($sso, $courseid, $feedback, $options)
    {
        $this->err = $this->feedback_form_validate($sso);
        $this->err = $this->feedback_form_validate($courseid);
        $this->err = $this->feedback_form_validate($feedback);
        $this->err = $this->feedback_form_validate($options);
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
