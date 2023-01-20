<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;
use Session;

class ReligionController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $religions = Religion::all();
        return view('oas.superadmin.religion.home', compact('religions'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
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
    /*
    |-----------------------------------------------------------
    | Update function
    |-----------------------------------------------------------
    */
    public function update()
    {
        $r = request();
        $religion = Religion::find($r->id);
        ($r->religion_code != null) ? $religion->religion_code = $r->religion_code :'';
        ($r->religion_name != null) ? $religion->name = $r->religion_name :'';
        ($r->religion_status != null) ? $religion->status = $r->religion_status :'';
        $religion->save();
        Session::flash('success','Religion updated successfully.');
        return back();
    }
}
