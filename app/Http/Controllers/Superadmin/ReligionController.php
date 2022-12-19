<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;
use Session;

class ReligionController extends Controller
{
    //
    public function index()
    {
        $religions = Religion::all();
        return view('oas.superadmin.religion.home', compact('religions'));
    }
    /**
     * create new religion function
     */
    public function create()
    {
        $r = request();
        $createReligion = Religion::create([
            'religion_code' => $r->religion_code,
            'name' => $r->religion_name,
        ]);
        Session::flash('success','New religion created successfully.');
        return back();
    }
    /**
     * update religion function
     */
    public function update()
    {
        $r = request();
        $religion = Religion::find($r->id);
        if($r->religion_code != '' && $r->religion_name != '' && $r->religion_status != ''){
            $religion->religion_code = $r->religion_code;
            $religion->name = $r->religion_name;
            $religion->status = $r->religion_status;
        }
        else if($r->religion_code != '' && $r->religion_name != '' && $r->religion_status == ''){
            $religion->religion_code = $r->religion_code;
            $religion->name = $r->religion_name;
        }
        else if($r->religion_code == '' && $r->religion_name != '' && $r->religion_status != ''){
            $religion->name = $r->religion_name;
            $religion->status = $r->religion_status;
        }
        else if($r->religion_code != '' && $r->religion_name == '' && $r->religion_status != ''){
            $religion->religion_code = $r->religion_code;
            $religion->status = $r->religion_status;
        }
        else if($r->religion_code != '' && $r->religion_name == '' && $r->religion_status == ''){
            $religion->religion_code = $r->religion_code;
        }
        else if($r->religion_code == '' && $r->religion_name !='' && $r->religion_status == ''){
            $religion->name = $r->religion_name;
        }
        else if($r->religion_code == '' && $r->religion_name =='' && $r->religion_status != ''){
            $religion->status = $r->religion_status;
        }
        $religion->save();
        Session::flash('success','Religion updated successfully.');
        return back();
    }
}
