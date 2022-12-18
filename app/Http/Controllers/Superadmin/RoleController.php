<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Session;

class RoleController extends Controller
{
    // 
    public function index()
    {
        $roles = Role::all();
        return view('oas.superadmin.role.home', compact('roles'));
    }
    /**
     * create new role function
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
    /**
     * update role function
     */
    public function update()
    {
        $r = request();
        $role = Role::find($r->id);
        if($r->role_name != ''){
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

