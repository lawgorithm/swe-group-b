<?php namespace App\Http\Controllers;

//Namespace for accepting requests
use Illuminate\Support\Facades\Request;
use App\Applicant;
use App\Course;
use App\Applicant_Course;

class FormController extends Controller {
    protected $check;
	/*
	|--------------------------------------------------------------------------
	| Form Controller
	|--------------------------------------------------------------------------
	|
	| Displays form fields for users.
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
        $courses = Course::all()->toArray();

        return view('form', ['courses' => $courses]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
    {
        $input = Request::all();

        $user = \Auth::user()->toArray();

        if ($input['studentStatus'] == 'Und') {
            $program = $input['studentStatus'] . " " . $input['studentMajor'] . " "
                . $input['studentField'] . " " . $input['studentYear'];
            $GPA = $input['studentGPA'];
        } else {
            $program = $input['studentStatus'];
            $GPA = null;
        }

        $speakscore = ($input['studentOpt'] != "") ? $input['studentOpt'] : 0;

        $speakdate = ($input['speakDate'] != "") ? $input['speakDate'] : null;

        $work = ($input['studentWork'] != "") ? $input['studentWork'] : null;

        Applicant::create([
            'sso' => $user['sso'],
            'name' => $user['name'],
            'email' => $user['email'],
            'phone' => $input['studentPhone'],
            'gpa' => $GPA,
            'graddate' => $input['gradDate'],
            'program' => $program,
            'previouswork' => $work,
            'speakscore' => $speakscore,
            'speakdate' => $speakdate
        ]);

        foreach ($input['prevTaught'] as $prev) {
            Applicant_Course::create([
                'sso' => $user['sso'],
                'courseid' => $prev,
                'action' => "100"
            ]);
        }
        foreach ($input['currTaught'] as $curr) {
            Applicant_Course::create([
                'sso' => $user['sso'],
                'courseid' => $curr,
                'action' => "010"
            ]);
        }
        foreach ($input['likeTeach'] as $like) {
            Applicant_Course::create([
                'sso' => $user['sso'],
                'courseid' => $like,
                'action' => "001"
            ]);
        }

        return "It worked " . serialize($input) . "!";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}