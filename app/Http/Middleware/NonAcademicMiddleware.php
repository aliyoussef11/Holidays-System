<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class NonAcademicMiddleware
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->role == 'non-academic'){
            return $next($request);
        }

        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin');
        }

        if(Auth::user()->role == 'academic'){
            return redirect()->route('academic');
        }
    }
}
