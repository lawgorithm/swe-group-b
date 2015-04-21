<?php namespace App\Http\Controllers;

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
        $this->middleware('guest');
    }

    /**
     * Show the application form page.
     *
     * @return Response
     */
    public function index()
    {
        $this->check = \Auth::check();
        if($this->check == false)
        {
            return redirect('auth/login');
        }

        return view('feedback');
    }

}
