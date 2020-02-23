<?php

namespace App\Http\Middleware;
//namespace App\Http\Controllers\Auth;
use Closure;
use Illuminate\Support\Facades\Auth;
class roleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check() || Auth::user()->$role < 4){
            return redirect('/');
        }
        return $next($request);
    }
}
