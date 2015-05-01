<?php namespace App\Http\Controllers;

use App\Applicant_Course;
use App\Applicant_offer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use App\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    protected $check;

    /**
     * rank constructor: checks auth and role middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    /**
     * redirect index page to home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view ('admin/home');
    }

    /**
     * home page view
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {

        return view ('admin/home');
    }

    /**
     * forwards to rank home page
     *
     * @return \Illuminate\View\View
     */
    public function rank()
	{
        $courses = Course::all()->toArray();

        return view('admin/rank_home', ['courses' => $courses]);
	}


    /**
     * courseid rank page
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function rankShow($id)
    {

        $courses = Course::all()->toArray();

        $db = new DB();
        $applied = $db::table('users')
            ->join('applicantcourse', 'users.sso','=', 'applicantcourse.sso')
            ->join('applicant', 'users.sso', '=', 'applicant.sso')
            ->where('applicantcourse.action', '=', '001')
            ->where('applicantcourse.courseid', '=', $id)
            ->select('*')
            ->orderBy('applicantcourse.rank', 'asc')
            ->orderBy('applicantcourse.recommendation', 'desc')
            ->orderBy('applicant.gpa', 'desc')
            ->get();

        return view('admin/rank_course', ['courses' => $courses, 'applied' => $applied, 'cid' => $id]);
    }

    public function submit($id)
    {
        $courses = Course::all()->toArray();

        $offers = Applicant_Course::where('courseid', '=', $id)
            ->where('action', '=', '001')
            ->orderBy('rank')
            ->get();

        foreach ($offers as $offer) {
            Applicant_offer::create([
                'sso' => $offer->sso,
                'courseid' => $offer->courseid,
                'rank' => $offer->rank
            ]);
        }
        return view('admin/rank_submit', ['courses' => $courses]);
    }
}
