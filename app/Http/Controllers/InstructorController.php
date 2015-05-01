<?php namespace App\Http\Controllers;

use App\Applicant;
use App\Applicant_Course;
use App\Applicant_offer;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;

class InstructorController extends Controller {

	private $tempFeedback = array();
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
        var_dump($_POST); die();
    }

}
