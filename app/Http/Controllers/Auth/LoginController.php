<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Handle an authentication attempt.
     */
    public function redirectTo()
    {
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
            return $this->redirectTo = '/home';
        }
        elseif(Auth::user()->role_id == 3){
            return $this->redirectTo = '/admin-dashboard';
        }else{
            /**
             * TODO
             *  change when admin dashboard created!!
             */
            return $this->redirectTo = '/admin-dashboard';
        }
    }
}
