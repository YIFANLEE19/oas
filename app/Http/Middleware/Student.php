<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $UNAUTHORIZEDCODE = 403;
        if(Auth::check()){
            if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
                return $next($request);
            }
        }else{
            abort($UNAUTHORIZEDCODE,'Unauthorized action');
        }

        return redirect()->route('home');
    }
}
