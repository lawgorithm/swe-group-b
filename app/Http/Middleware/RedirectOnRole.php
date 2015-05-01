<?php namespace App\Http\Middleware;

use Closure;

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
            return redirect('applicant/home');
        }
        if ($request->user()->isInstructor() && ($request->segment(1) != 'instructor'))
        {
            return redirect('instructor/home');
        }
        if ($request->user()->isAdmin() && ($request->segment(1) != 'admin'))
        {
            return redirect('admin/home');
        }
        return $next($request);
	}

}
