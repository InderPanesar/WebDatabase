<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

/**
 * Class CheckAdmin
 * @package App\Http\Middleware
 */
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		//User is admin then allow access to view.
		if(auth()->user()->is_admin){
			return $next($request);
		}
		//If user isn't admin then return to welcome page.
		return redirect('');
    }
}