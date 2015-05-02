<?php namespace App\Http\Middleware;

use App\Phase;
use Carbon\Carbon;
use Closure;

class RedirectOnTime {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $phase = Phase::getPhaseData();

        if ($request->user()->isApplicant() && ($phase->open > Carbon::now()) && ($phase->transition < Carbon::now()))
        {
            return redirect('applicant/home');
        }
        if ($request->user()->isInstructor() && ($phase->transition > Carbon::now()) && ($phase->close < Carbon::now()))
        {
            return redirect('instructor/home');
        }
        if ($request->user()->isAdmin() && ($phase->open > Carbon::now()) && ($phase->transition < Carbon::now()))
        {
            return redirect('admin/home');
        }
		return $next($request);
	}

}
