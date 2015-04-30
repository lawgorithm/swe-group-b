<?php namespace App\Http\Controllers;

use App\Applicant;
use App\Applicant_Course;
use App\Applicant_offer;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;

class FeedbackController extends Controller {
    private $tempFeedback = array();
    /*
    |--------------------------------------------------------------------------
    | Feedback Controller
    |--------------------------------------------------------------------------
    |
    | Displays feedback fields for instructors.
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

    /**
     * Show the application form page.
     *
     * @return Response
     */
    public function index()
    {
        $courses = new Course();
        $courses = $courses->getAllCourses();

        return view('feedback', ['courses' => $courses]);

    }

    public function pickCourse(){
        $courses = new Course();
        $courses = $courses->getAllCourses();

        return view('course', ['courses' => $courses]);
    }

    public function redirectCourse(){
        $courseId = $_POST['course-list'];
        return redirect("feedback/$courseId");
    }

    public function showApplicants($id){
        $applicants = new Applicant();
        $applicants = $applicants->getApplicantsByCourseId($id);

        return view('feedback', ['applicants' => $applicants]);
    }

    public function store(){
        var_dump($_POST); die();
    }

}
