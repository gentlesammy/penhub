<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class BlockedUsers
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
        if(!Auth::check() || Auth::user()->blocked == 1){
            return redirect('/');
        }
        return $next($request);
    }
}
