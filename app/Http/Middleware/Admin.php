<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
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
        if(Auth::check()){
            if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4 || Auth::user()->role_id == 5 || Auth::user()->role_id == 6 || Auth::user()->role_id == 7){
                return $next($request);
            }
        }else{
            abort(403,'Unauthorized action');
        }

        return redirect()->route('home');
    }
}
