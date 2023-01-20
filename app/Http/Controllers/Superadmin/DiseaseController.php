<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;
use Session;


class DiseaseController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $diseases = Disease::all();
        return view('oas.superadmin.disease.home', compact('diseases'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createDisease = Disease::create([
            'name' => $r->disease_name,
        ]);
        Session::flash('success','New Disease created successfully.');
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
        $disease = Disease::find($r->id);
        ($r->disease_name != null ? $disease->name = $r->disease_name : '');
        ($r->disease_status != null ? $disease->status = $r->disease_status : '');
        $disease->save();
        Session::flash('success','Disease updated successfully');
        return back();
    }
}
