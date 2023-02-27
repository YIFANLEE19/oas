<?php

namespace App\Http\Controllers\Admin;

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
        $programmes = Programme::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getAllProgrammes = Programme::all();
        $mappingItems = array();
        $getDifferentSemesterYearMappings = ProgrammeRecord::select('semester_year_mapping_id')->distinct()->get();
        $getProgrammeOffers = ProgrammeRecord::all();
        if($getDifferentSemesterYearMappings != null){
            foreach($getDifferentSemesterYearMappings as $getDifferentSemesterYearMapping){
                $mappingItems[] = $getDifferentSemesterYearMapping->semester_year_mapping_id;
            }
            $semesterYearMappings = SemesterYearMapping::whereNotIn('id',$mappingItems)->get();
            return view('oas.admin.programmeOffer.home', compact(['programmes','getAllProgrammes','getDifferentSemesterYearMappings','semesterYearMappings','getProgrammeOffers']));
        }
        $semesterYearMappings = SemesterYearMapping::all();
        return view('oas.admin.programmeOffer.home', compact(['programmes','getAllProgrammes','getDifferentSemesterYearMappings','semesterYearMappings','getProgrammeOffers']));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $getAllSelectedProgrammeItems = $r->programme_id;
        foreach($getAllSelectedProgrammeItems as $item){
            ProgrammeRecord::create([
                'semester_year_mapping_id' => $r->semester_year_mapping_id,
                'programme_id' => $item,
            ]);
        }
        return back();
    }
    /*
    |-----------------------------------------------------------
    | Remove function
    |-----------------------------------------------------------
    */
    public function delete()
    {
        $r = request();
        $getSemesterYearMappingId = $r->semester_year_mapping_id;
        $getProgrammeId = $r->programme_id;

        $checkProgramme = ProgrammeRecord::where('semester_year_mapping_id', $getSemesterYearMappingId)->where('programme_id',$getProgrammeId)->first();
        if($checkProgramme == null){
            Session::flash('error',"It is not offered this semester!");
            return back();
        }else{
            $checkProgramme->delete();
            Session::flash('success',"Successful removal!");
            return redirect()->route('programmeOffer.home');
        }
    }
    /*
    |-----------------------------------------------------------
    | Update function
    |-----------------------------------------------------------
    */
    public function update()
    {
        $r = request();
        $getSemesterYearMappingId = $r->semester_year_mapping_id;
        $getProgrammeId = $r->programme_id;
        $checkProgramme = ProgrammeRecord::where('semester_year_mapping_id', $getSemesterYearMappingId)->where('programme_id',$getProgrammeId)->first();
        if($checkProgramme != null){
            Session::flash('alreadyOffer',"Already offer");
            return back();
        }else{
            ProgrammeRecord::create([
                'semester_year_mapping_id' => $getSemesterYearMappingId,
                'programme_id' => $getProgrammeId,
            ]);
            Session::flash('notYetOffer',"Programme add successfully");
            return back();
        }
    }
}
