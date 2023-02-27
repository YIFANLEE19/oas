<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Session;

class NationalityController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $nationalities = Nationality::all();
        return view('oas.admin.nationality.home', compact('nationalities'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
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
    /*
    |-----------------------------------------------------------
    | Update function
    |-----------------------------------------------------------
    */
    public function update()
    {
        $r = request();
        $nationality = Nationality::find($r->id);
        ($r->nationality_code != null) ? $nationality->nationality_code = $r->nationality_code :'';
        ($r->nationality_name != null) ? $nationality->name = $r->nationality_name :'';
        ($r->nationality_status != null) ? $nationality->status = $r->nationality_status :'';
        $nationality->save();
        Session::flash('success','Nationality updated successfully.');
        return back();
    }
}
