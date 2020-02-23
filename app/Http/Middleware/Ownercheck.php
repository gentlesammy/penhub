<?php

namespace App\Http\Middleware;

use Closure;

class Ownercheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $owner_id, $user_id, $destination)
    {
        if($owner_id != $user_id){
            return redirect($destination);
        }

        return $next($request);
    }
}
