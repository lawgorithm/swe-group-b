<?php namespace App\Http\Middleware;

use Closure;
use Laracasts\Flash\Flash;

class RedirectOnRole {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ($request->user()->isApplicant() && ($request->segment(1) != 'applicant'))
        {
            Flash::warning('You do not have access to that content');
            return redirect('applicant/home');
        }
        if ($request->user()->isInstructor() && ($request->segment(1) != 'instructor'))
        {
            Flash::warning('You do not have access to that content');
            return redirect('instructor/home');
        }
        if ($request->user()->isAdmin() && ($request->segment(1) != 'admin'))
        {
            Flash::warning('You do not have access to that content');
            return redirect('admin/home');
        }
        return $next($request);
	}

}
