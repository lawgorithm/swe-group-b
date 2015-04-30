<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RankController extends Controller {
    protected $check;

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $courses = Course::all()->toArray();

        $db = new DB();
        $applied = $db::table('users')
                    ->join('applicantcourse', 'users.sso','=', 'applicantcourse.sso')
                    ->where('applicantcourse.action', '=', '001')
                    ->select('*')
                    ->get();

        return view('rank', ['courses' => $courses, 'applied' => $applied]);
	}

    public function show($id){

        $courses = Course::all()->toArray();

        $db = new DB();
        $applied = $db::table('users')
            ->join('applicantcourse', 'users.sso','=', 'applicantcourse.sso')
            ->where('applicantcourse.action', '=', '001')
            ->where('applicantcourse.courseid', '=', $id)
            ->select('*')
            ->get();

        return view('rank', ['courses' => $courses, 'applied' => $applied]);
    }
}
