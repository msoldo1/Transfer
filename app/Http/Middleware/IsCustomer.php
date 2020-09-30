<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCustomer
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
        if(Auth::guest() == true){
            return redirect('/home');
        }elseif (auth()->user()->is_customer == 1) {
            return $next($request);
        }else{
            return redirect('/home');
        }
    }
}
