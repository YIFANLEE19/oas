<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ProgrammeType;
use Illuminate\Http\Request;
use Session;

class ProgrammeTypeController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $programmeTypes = ProgrammeType::all();
        return view('oas.superadmin.programmeType.home', compact('programmeTypes'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createProgrammeType = ProgrammeType::create([
            'type' => $r->type_name,
        ]);
        Session::flash('success','New programme type created successfully.');
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
        $programmeType = ProgrammeType::find($r->id);
        $programmeType->type = $r->type_name;
        $programmeType->save();
        Session::flash('success','Programme type updated successfully');
        return back();
    }
}
