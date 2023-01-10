<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Marital;
use Illuminate\Http\Request;
use Session;

class MaritalController extends Controller
{
    //
    public function index()
    {
        $maritals = Marital::all();
        return view('oas.superadmin.marital.home', compact('maritals'));
    }
    /**
     * create new marital function
     */
    public function create()
    {
        $r = request();
        $createMarital = Marital::create([
            'marital_code' => $r->marital_code,
            'name' => $r->marital_name,
        ]);
        Session::flash('success','New marital created successfully.');
        return back();
    }
    /**
     * update marital function
     */
    public function update()
    {
        $r = request();
        $marital = Marital::find($r->id);
        if($r->marital_code != null && $r->marital_name != null && $r->marital_status != null){
            $marital->marital_code = $r->marital_code;
            $marital->name = $r->marital_name;
            $marital->status = $r->marital_status;
        }
        else if($r->marital_code != null && $r->marital_name != null && $r->marital_status == null){
            $marital->marital_code = $r->marital_code;
            $marital->name = $r->marital_name;
        }
        else if($r->marital_code == null && $r->marital_name != null && $r->marital_status != null){
            $marital->name = $r->marital_name;
            $marital->status = $r->marital_status;
        }
        else if($r->marital_code != null && $r->marital_name == null && $r->marital_status != null){
            $marital->marital_code = $r->marital_code;
            $marital->status = $r->marital_status;
        }
        else if($r->marital_code != null && $r->marital_name == null && $r->marital_status == null){
            $marital->marital_code = $r->marital_code;
        }
        else if($r->marital_code == null && $r->marital_name !=null && $r->marital_status == null){
            $marital->name = $r->marital_name;
        }
        else if($r->marital_code == null && $r->marital_name ==null && $r->marital_status != null){
            $marital->status = $r->marital_status;
        }
        $marital->save();
        Session::flash('success','Marital updated successfully.');
        return back();
    }
}
