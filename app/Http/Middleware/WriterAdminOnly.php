<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class WriterAdminOnly
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
        if(!in_array(Auth::user()->role, [2, 4, 5])){
            return back()->with('flash_message', 'Only a writer is allowed in this zone')->with('flash_type', 'alert-danger');
        }
        return $next($request);
    }
}
