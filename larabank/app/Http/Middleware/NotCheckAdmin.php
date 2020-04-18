<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

/**
 * Class NotCheckAdmin
 * @package App\Http\Middleware
 */
class NotCheckAdmin
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
		//If the user is not admin then move on to next page.
		if(!auth()->user()->is_admin){
			return $next($request);
		}
		//If the user is admin return to welcome page.
		return redirect('');
    }
}