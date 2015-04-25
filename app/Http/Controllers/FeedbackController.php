<?php namespace App\Http\Controllers;

use App\Applicant;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FeedbackController extends Controller {
    protected $check;
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
        $applicants = $applicants->getApplicantsByCourseId('CS1050');

        return view('feedback')->with('applicants', $applicants);
    }
}
