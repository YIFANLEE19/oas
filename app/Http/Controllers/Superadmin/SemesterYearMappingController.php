<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SemesterYearMapping;
use App\Models\Semester;
use Session;

class SemesterYearMappingController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $semesters = Semester::all();
        $semesterYearMappings = SemesterYearMapping::all();
        return view('oas.superadmin.semesterYearMapping.home', compact('semesters','semesterYearMappings'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();

        $createSemesterYearMapping = SemesterYearMapping::create([
            'semester_id' => $r->semester_id,
            'year' => $r->year,
        ]);

        Session::flash('success','New semester year mapping created successfully.');
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
        $semesterYearMapping = SemesterYearMapping::find($r->id);
        ($r->semester_id != null) ? $semesterYearMapping->semester_id = $r->semester_id :'';
        ($r->year != null) ? $semesterYearMapping->year = $r->year :'';
        $semesterYearMapping->save();
        Session::flash('success','Semester year mapping updated successfully');
        return back();
    }


}
