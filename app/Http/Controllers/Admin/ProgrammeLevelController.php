<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgrammeLevel;
use Illuminate\Http\Request;
use Session;

class ProgrammeLevelController extends Controller
{
    //
    public function index()
    {
        $programmeLevels = ProgrammeLevel::all();
        return view('oas.admin.programmeLevel.home', compact('programmeLevels'));
    }
    /**
     * create new programme level function
     */
    public function create()
    {
        $r = request();
        $createProgrammeLevel = ProgrammeLevel::create([
            'level' => $r->level_name,
        ]);
        Session::flash('success','New programme level created successfully.');
        return back();
    }
    /**
     * update role function
     */
    public function update()
    {
        $r = request();
        $programmeLevel = ProgrammeLevel::find($r->id);
        $programmeLevel->level = $r->level_name;
        $programmeLevel->save();
        Session::flash('success','Programme level updated successfully');
        return back();
    }
}
