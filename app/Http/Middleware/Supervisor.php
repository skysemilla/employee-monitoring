<?php

namespace App\Http\Middleware;

use Closure;

class Supervisor
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
        if(auth()->user()->type == 'supervisor'){
        return $next($request);
      }
        return redirect('home')->with('error','You have not supervisor access');
    }
}
