<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\Request;
use Session;

class GenderController extends Controller
{
    //
    public function index()
    {
        $genders = Gender::all();
        return view('oas.superadmin.gender.home', compact('genders'));
    }
    /**
     * create new gender function
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
    /**
     * update gender function
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
