<?php namespace App\Http\Controllers;

use App\Applicant_Course;
use App\Applicant_offer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use App\Applicant;
use App\Phase;
//use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;


class AdminController extends Controller
{

    protected $check;
    protected $phaseDefinition = ['Awaiting Configuration', 'Collecting Applications', 'Collecting Feedback', 'Awaiting Ranking'];
    protected $phaseFormat = 'l, F jS';

    /**
     * rank constructor: checks auth and role middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
        $this->middleware('time', ['only' => ['rank', 'rankShow', 'submit', 'save']]);
    }

    /**
     * redirect index page to home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin/home');
    }

    /**
     * home page view
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('admin/home');
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
        if (Course::checkIfCourseComplete($id)) {
            Flash::info('Course ' . $id . ' Rank Already Submitted!');
            return redirect()->back();
        }

        $courses = Course::all()->toArray();

        $db = new DB();
        $applied = $db::table('users')
            ->join('applicantcourse', 'users.sso', '=', 'applicantcourse.sso')
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


    /**
     * function to submit rank and create offer field
     * called on submit button click
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function submit($id)
    {
        $offers = Applicant_Course::where('courseid', '=', $id)
            ->where('action', '=', '001')
            ->orderBy('rank', 'asc')
            ->get();

        $count = 1;
        foreach ($offers as $offer) {
            Applicant_offer::create([
                'sso' => $offer->sso,
                'courseid' => $offer->courseid,
                'rank' => $count
            ]);
            $count++;
        }

        Flash::success('Rank Submitted for ' . $id . '!');
        return redirect('admin/rank');
    }

    /**
     * function to update rank for course
     * called whenever order is changed
     */
    public function save()
    {
        $input = Request::all();

        $ids = $input['ids'];
        $courseid = $input['courseid'];

        $count = 1;
        foreach ($ids as $id) {
            Applicant_Course::where('courseid', '=', $courseid)
                ->where('sso', '=', $id)
                ->where('action', '=', '001')
                ->update(['rank' => $count]);
            $count++;
        }
    }

    public function settings()
    {

        return view('admin/settings', $this->getPhaseData());
    }

    public function getPhaseData()
    {
        $data['phaseCode'] = $this->getPhaseCode();
        $data['phaseDefinition'] = $this->phaseDefinition[$data['phaseCode']];

        if ($data['phaseCode'] !== 0) {

            $hold = Phase::all()->last()->toArray();

            $fs = $this->phaseFormat;

            $data = [];
            $data['phaseCode'] = $this->getPhaseCode();
            $data['phaseDefinition'] = $this->phaseDefinition[$data['phaseCode']];
            $data['open'] = Carbon::parse($hold['open'])->format($fs);
            $data['transition'] = Carbon::parse($hold['transition'])->format($fs);
            $data['close'] = Carbon::parse($hold['close'])->format($fs);
            $data['author'] = $hold['author'];

        }
        return $data;
    }

    public function getPhaseCode()
    {
        $hold = Phase::all();
        $dt = Carbon::now('America/Chicago');
        if ($hold->count() === 0) {
            return 0;
        }

        $hold = $hold->last()->toArray();

        if ($dt < $hold['open']) {
            return 1;
        } else if ($dt >= $hold['open'] && $dt < $hold['transition']) {
            return 2;
        } else if ($dt >= $hold['transition'] && $dt < $hold['close']) {
            return 3;
        } else if ($dt >= $hold['close']) {
            return 4;
        }

    }


    public function phaseStore()
    {
        $input = Request::all();
        $input['author'] = \Auth::user()->sso;

        $phase = Phase::create($input);

        $phase->save();

        $phase = Phase::all()->last()->toArray();
        $data = $this->getPhaseSentences($phase);


        return view('admin/settings', $data);
    }

    public function sendOffers()
    {
        $topTen = new Applicant();
        $topTen = $topTen->getTopTenApplicantsByCourseId();

        return view('admin/offer', ['topTen' => $topTen]);
    }

    public function sendEmail()
    {
        if (Session::token() !== Input::get('_token')) {
            return Response::json(array(
                'msg' => 'Unauthorized attempt to create setting'
            ));
        }

        $email = Input::get('email');
        $email = htmlspecialchars($email);
        $email = pg_escape_string($email);

        if (isset($email)) {

            $data = ['recipient' => $email];

            Mail::send('emails.offer', $data, function ($message) use ($data) {
                $message->to($data['recipient'])->subject('TA Position Job Offer!');
            });

            $response = array(
                'status' => 'success',
                'msg' => 'Email was sent successfully',
            );
        } else {
            $response = array(
                'status' => 'failure',
                'msg' => 'Email was sent unsuccessfully',
            );
        }

        return Response::json($response);
    }
}
