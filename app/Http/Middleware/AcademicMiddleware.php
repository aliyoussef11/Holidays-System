<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AcademicMiddleware
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
            return redirect()->route('non-academic');
        }

        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin');
        }

        if(Auth::user()->role == 'academic'){
            return $next($request);
        }
    }
}
