<?php namespace App\Http\Controllers;

//Namespace for accepting requests
use Illuminate\Support\Facades\Request;

class WelcomeController extends Controller {

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
		return view('welcome');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = Request::all();

		return "It worked " . serialize($input) . "!";
	}
}