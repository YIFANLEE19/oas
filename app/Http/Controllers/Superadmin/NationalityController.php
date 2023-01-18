<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Session;

class NationalityController extends Controller
{
    //
    public function index()
    {
        $nationalities = Nationality::all();
        return view('oas.superadmin.nationality.home', compact('nationalities'));
    }
    /**
     * create new nationality function
     */
    public function create()
    {
        $r = request();
        $createNationality = Nationality::create([
            'nationality_code' => $r->nationality_code,
            'name' => $r->nationality_name,
        ]);
        Session::flash('success','New nationality created successfully.');
        return back();
    }
    /**
     * update nationality function
     */
    public function update()
    {
        $r = request();
        $nationality = Nationality::find($r->id);
        if($r->nationality_code != null && $r->nationality_name != null && $r->nationality_status != null){
            $nationality->nationality_code = $r->nationality_code;
            $nationality->name = $r->nationality_name;
            $nationality->status = $r->nationality_status;
        }
        else if($r->nationality_code != null && $r->nationality_name != null && $r->nationality_status == null){
            $nationality->nationality_code = $r->nationality_code;
            $nationality->name = $r->nationality_name;
        }
        else if($r->nationality_code == null && $r->nationality_name != null && $r->nationality_status != null){
            $nationality->name = $r->nationality_name;
            $nationality->status = $r->nationality_status;
        }
        else if($r->nationality_code != null && $r->nationality_name == null && $r->nationality_status != null){
            $nationality->nationality_code = $r->nationality_code;
            $nationality->status = $r->nationality_status;
        }
        else if($r->nationality_code != null && $r->nationality_name == null && $r->nationality_status == null){
            $nationality->nationality_code = $r->nationality_code;
        }
        else if($r->nationality_code == null && $r->nationality_name !=null && $r->nationality_status == null){
            $nationality->name = $r->nationality_name;
        }
        else if($r->nationality_code == null && $r->nationality_name ==null && $r->nationality_status != null){
            $nationality->status = $r->nationality_status;
        }
        $nationality->save();
        Session::flash('success','Nationality updated successfully.');
        return back();
    }
}
