<?php namespace App\Http\Controllers;

//Namespace for accepting requests
use Illuminate\Support\Facades\Request;

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

		return view('form');
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

		/*
			TODO AFTER DB
			INSERT VALUES INTO db;
		*/

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