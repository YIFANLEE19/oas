<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\ProgrammeRecord;
use App\Models\SemesterYearMapping;
use App\Models\Semester;
use Session;

class ProgrammeOfferController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $programmes = Programme::all();
        $mappingItems = array();
        $getDifferentSemesterYearMappings = ProgrammeRecord::select('semester_year_mapping_id')->distinct()->get();
        if($getDifferentSemesterYearMappings != null){
            foreach($getDifferentSemesterYearMappings as $getDifferentSemesterYearMapping){
                $mappingItems[] = $getDifferentSemesterYearMapping->semester_year_mapping_id;
            }
            $semesterYearMappings = SemesterYearMapping::whereNotIn('id',$mappingItems)->get();
            return view('oas.superadmin.programmeOffer.home', compact(['programmes','semesterYearMappings']));
        }
        $semesterYearMappings = SemesterYearMapping::all();
        return view('oas.superadmin.programmeOffer.home', compact(['programmes','semesterYearMappings']));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $programmes = Programme::all();
        foreach($programmes as $programme){
            ProgrammeRecord::create([
                'semester_year_mapping_id' => $r->semester_year_mapping_id,
                'programme_id' => $programme->id,
            ]);
        }
        return back();
    }
}
