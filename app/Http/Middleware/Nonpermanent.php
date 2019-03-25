<?php

namespace App\Http\Middleware;

use Closure;

class Nonpermanent
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
        if(auth()->user()->type == 'nonpermanent'){
        return $next($request);
      }
        return redirect('home')->with('error','You have not nonpermanent employee access');
    }
}
