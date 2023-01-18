<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolLevel;
use Session;

class SchoolLevelController extends Controller
{
    // 
    public function index()
    {
        $school_levels = SchoolLevel::all();
        return view('oas.superadmin.school_Level.home', compact('school_levels'));
    }
    /**
     * create new SchoolLevel function
     */
    public function create()
    {
        $r = request();
        $createSchoolLevel = SchoolLevel::create([
            'name' => $r->school_level_name,
        ]);
        Session::flash('success','New School Level created successfully.');
        return back();
    }
    /**
     * update SchoolLevel function
     */
    public function update()
    {
        $r = request();
        $SchoolLevel = SchoolLevel::find($r->id);
        ($r->school_level_name != null ? $SchoolLevel->name = $r->school_level_name : '');
        ($r->school_level_status != null ? $SchoolLevel->status = $r->school_level_status : '');
        $SchoolLevel->save();
        Session::flash('success','School Level updated successfully');
        return back();
    }
}
