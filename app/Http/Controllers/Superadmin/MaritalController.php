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
        ($r->marital_code != null) ? $marital->marital_code = $r->marital_code :'';
        ($r->marital_name != null) ? $marital->name = $r->marital_name :'';
        ($r->marital_status != null) ? $marital->status = $r->marital_status :'';
        $marital->save();
        Session::flash('success','Marital updated successfully.');
        return back();
    }
}
