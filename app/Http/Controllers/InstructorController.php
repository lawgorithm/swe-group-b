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
    }

    public function index()
    {
    	return view('instructor/home');
    }

    public function home()
    {
    	return view('instructor/home');
    }

    public function pickCourse()
    {
        $courses = new Course();
        $courses = $courses->getAllCourses();

        return view('course', ['courses' => $courses]);
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
        $sso = Input::get('sso');
        $courseid = Input::get('courseid');
        $feedback = Input::get('feedback');
        $options = Input::get('option');

        $err = $this->feedback_form_validate($sso);
        ($err == false) ? array_push($applicant, $sso) : $errmsg = 'Applicant pawprint was not found';

        $err = $this->feedback_form_validate($courseid);
        ($err == false) ? array_push($applicant, $courseid) : $errmsg = 'Applicant course was not found';

        $err = $this->feedback_form_validate($feedback);
        ($err == false) ? array_push($applicant, $feedback) : $errmsg = 'Applicant feedback was not given';

        $err = $this->feedback_form_validate($options);
        ($err == false) ? array_push($applicant, $options) : $errmsg = 'Applicant option was not selected';

        echo "<pre>";
        var_dump($applicant);
        die();

        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );

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
}
