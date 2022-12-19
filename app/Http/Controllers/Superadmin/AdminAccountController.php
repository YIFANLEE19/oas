<?php

namespace App\Http\Controllers\Superadmin;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Session;

class AdminAccountController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('oas.superadmin.adminAcc.home', compact(['roles','users']));
    }
    /**
     * create admin account
     */
    public function create()
    {
        $r = request();
        $this->validate($r, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $r->name,
            'role_id' => $r->role_id,
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);
        Session::flash('success','New admin account created successfully.');
        return back();
    }
}
