<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCompany
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
        }elseif(auth()->user()->is_company == 1){
                return $next($request);
        }else{
            return redirect('/home');
        }

    }
}
