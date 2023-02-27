<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\ProgrammeType;
use App\Models\ProgrammeLevel;
use Illuminate\Http\Request;
use Session;

class ProgrammeController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $programmeLevels = ProgrammeLevel::all();
        $programmeTypes = ProgrammeType::all();
        $programmes = Programme::all();
        return view('oas.superadmin.programme.home', compact('programmeLevels','programmeTypes','programmes'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createProgramme = Programme::create([
            'en_name' => $r->programme_name,
            'programme_level_id' => $r->programme_level_id,
            'programme_type_id' => $r->programme_type_id,
            'programme_code' => $r->programme_code,
        ]);
        Session::flash('success','New programme created successfully.');
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
        $programme = Programme::find($r->id);
        ($r->programme_name != '') ? $programme->en_name = $r->programme_name : '';
        ($r->programme_level_id != '') ? $programme->programme_level_id = $r->programme_level_id : '';
        ($r->programme_type_id != '') ? $programme->programme_type_id = $r->programme_type_id : '';
        ($r->programme_code != '') ? $programme->programme_code = $r->programme_code : '';
        ($r->programme_status != '') ? $programme->status = $r->programme_status : '';
        $programme->save();
        Session::flash('success','programme updated successfully.');
        return back();
    }
}
