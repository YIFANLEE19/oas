<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;
use Session;

class SemesterController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $semesters = Semester::all();
        return view('oas.admin.semester.home', compact('semesters'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createSemester = Semester::create([
            'semester' => $r->semester,
        ]);
        Session::flash('success','New semester created successfully.');
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
        $semester = Semester::find($r->id);
        $semester->semester = $r->semester;
        $semester->save();
        Session::flash('success','semester updated successfully');
        return back();
    }
}
