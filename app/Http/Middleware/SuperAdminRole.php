<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class SuperAdminRole
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
        if(Auth::user()->role != 5){
            return back()->with('flash_message', 'Unable to Perform Action, Please contact Super Admin')->with('flash_type', 'alert-danger');
        }
        return $next($request);
    }
}
