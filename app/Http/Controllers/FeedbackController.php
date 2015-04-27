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
        $applicants = new Applicant();

        $applicants = $applicants->getApplicantsByCourseId('CS1050');


        return view('feedback', ['applicants' => $applicants, 'courses' => $courses]);
    }

    
    public function store(Request $request){
        $applicant = new \stdClass();
        $applicant_feedback = new Applicant_offer();

        if(isset($_POST)) {
            $applicant->name = $_POST['students'];
            $applicant->acceptedstatus = $_POST['optionsRadios'];
            $applicant->feedback = $_POST['feedback'];

            $success = $applicant_feedback->updateApplicantFeedback($applicant);

            if ($success == true) {
                return redirect('feedback');
            }
        }
        else{
            echo "You didn't fill out the required materials";
        }
    }
}
