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
        if($r->gender_code != null && $r->gender_name != null && $r->gender_status != null){
            $gender->gender_code = $r->gender_code;
            $gender->name = $r->gender_name;
            $gender->status = $r->gender_status;
        }
        else if($r->gender_code != null && $r->gender_name != null && $r->gender_status == null){
            $gender->gender_code = $r->gender_code;
            $gender->name = $r->gender_name;
        }
        else if($r->gender_code == null && $r->gender_name != null && $r->gender_status != null){
            $gender->name = $r->gender_name;
            $gender->status = $r->gender_status;
        }
        else if($r->gender_code != null && $r->gender_name == null && $r->gender_status != null){
            $gender->gender_code = $r->gender_code;
            $gender->status = $r->gender_status;
        }
        else if($r->gender_code != null && $r->gender_name == null && $r->gender_status == null){
            $gender->gender_code = $r->gender_code;
        }
        else if($r->gender_code == null && $r->gender_name !=null && $r->gender_status == null){
            $gender->name = $r->gender_name;
        }
        else if($r->gender_code == null && $r->gender_name ==null && $r->gender_status != null){
            $gender->status = $r->gender_status;
        }
        $gender->save();
        Session::flash('success','Gender updated successfully.');
        return back();
    }
}
