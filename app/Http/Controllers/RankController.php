<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

        return view('rank', ['courses' => $courses]);
	}
}
