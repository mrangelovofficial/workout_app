<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Check if is admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->user()->isAdmin){
            return redirect()->route('routine.index');
        }
        return $next($request);
    }

}
