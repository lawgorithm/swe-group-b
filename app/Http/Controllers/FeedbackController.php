<?php namespace App\Http\Controllers;

use App\Applicant;
use App\Applicant_Course;
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
    }

    /**
     * Show the application form page.
     *
     * @return Response
     */
    public function index()
    {
        $applicants = new Applicant();
       // $applicants = $applicants->getApplicantsByCourseId('CS1050');

        return view('feedback');
    }

    public function store(Request $request){
        $applicant_feedback = new \stdClass();
        $applicants = array();

        $applicants = [
            0 => $applicant_feedback->name = $_POST['students'],
            1 => $applicant_feedback->acceptedstatus = $_POST['optionsRadios'],
            2 => $applicant_feedback->feedback = $_POST['feedback'],
        ];

        return redirect('feedback');
    }
}
