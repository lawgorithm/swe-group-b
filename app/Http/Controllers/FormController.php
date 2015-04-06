<?php namespace App\Http\Controllers;

class FormController extends Controller {

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
		return view('form');
	}

}
