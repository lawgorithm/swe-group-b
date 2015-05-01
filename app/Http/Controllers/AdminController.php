<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use App\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    protected $check;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
        return view ('admin/home');
    }

	//
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function rank()
	{
        $courses = Course::all()->toArray();

        $db = new DB();

        return view('admin/rank', ['courses' => $courses]);
	}

    public function home()
    {

        return view ('admin/home');
    }

	public function rankShow($id){

        $courses = Course::all()->toArray();

        $db = new DB();
        $applied = $db::table('users')
            ->join('applicantcourse', 'users.sso','=', 'applicantcourse.sso')
            ->join('applicant', 'users.sso', '=', 'applicant.sso')
            ->where('applicantcourse.action', '=', '001')
            ->where('applicantcourse.courseid', '=', $id)
            ->select('*')
            ->orderBy('applicantcourse.rank', 'asc')
            ->get();

        return view('admin/rank', ['courses' => $courses, 'applied' => $applied]);
    }

}
