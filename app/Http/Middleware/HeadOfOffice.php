<?php

namespace App\Http\Middleware;

use Closure;

class HeadOfOffice
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
        if(auth()->user()->type == 'head_of_office'){
        return $next($request);
      }
        return redirect('home')->with('error','You have not head of office access');
    }
}
