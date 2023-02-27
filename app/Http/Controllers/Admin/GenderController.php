<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\Request;
use Session;

class GenderController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $genders = Gender::all();
        return view('oas.admin.gender.home', compact('genders'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createGender = Gender::create([
            'gender_code' => $r->gender_code,
            'name' => $r->gender_name,
        ]);
        Session::flash('success','New gender created successfully.');
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
        $gender = Gender::find($r->id);
        ($r->gender_code != null) ? $gender->gender_code = $r->gender_code : '';
        ($r->gender_name != null) ? $gender->gender_name = $r->gender_name : '';
        ($r->gender_status != null) ? $gender->status = $r->gender_status : '';
        $gender->save();
        Session::flash('success','Gender updated successfully.');
        return back();
    }
}
