<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Session;

class RoleController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $roles = Role::all();
        return view('oas.admin.role.home', compact('roles'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createRole = Role::create([
            'name' => $r->role_name,
        ]);
        Session::flash('success','New role created successfully.');
        return back();
    }
    /*
    |-----------------------------------------------------------
    | Update function
    |-----------------------------------------------------------
    */
    public function update()
    {
        $r = request();
        $role = Role::find($r->id);
        if($r->role_name != null){
            $role->name = $r->role_name;
            $role->status = $r->role_status;
        }else{
            $role->status = $r->role_status;
        }
        $role->save();
        Session::flash('success','Role updated successfully');
        return back();
    }
}

