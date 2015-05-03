<?php namespace App\Http\Middleware;

use App\Phase;
use Carbon\Carbon;
use Closure;
use Laracasts\Flash\Flash;

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
        if ($phase == NULL)
        {
            Flash::info('No Time Set!');
            return redirect('applicant/home')->flash;
        }

        if ($request->user()->isApplicant() && (($phase->open > Carbon::now('America/Chicago')) || ($phase->transition < Carbon::now('America/Chicago'))))
        {
            Flash::info('Applicant Window Closed!');
            return redirect('applicant/home');
        }
        if ($request->user()->isInstructor() && (($phase->transition > Carbon::now('America/Chicago')) || ($phase->close < Carbon::now('America/Chicago'))))
        {
            Flash::info('Feedback Window Closed');
            return redirect('instructor/home');
        }
        if ($request->user()->isAdmin() && ($phase->close > Carbon::now('America/Chicago')) )
        {
            Flash::info('Rank Window Closed!');
            return redirect('admin/home');
        }
		return $next($request);
	}

}
