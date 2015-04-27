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
        if ($request->user()->isApplicant() && !$request->is('form')){

            return redirect()->to('/home');
        }
        else if ($request->user()->isInstructor() && !$request->is('feedback')){

            return redirect()->to('/home');
        }
        else if ($request->user()->isAdmin() && !$request->is('rank')){

            return redirect()->to('/home');
        }

		return $next($request);
	}

}
