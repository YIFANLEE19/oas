<?php

namespace App\Http\Controllers\ApplyProgram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationRecord;
use App\Models\ApplicationStatusLog;
use App\Models\ApplicantStatusLog;
use App\Models\SemesterYearMapping;
use App\Models\ProgrammeRecord;
use App\Models\ProgrammePicked;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

use Auth;

class ApplyProgramController extends Controller
{
    /*
    |-----------------------------------
    | Return home page
    |-----------------------------------
    */
    public function index()
    {
        // $semester_id;
        // if(date('n') < 3){
        //     $semester_id =1;
        // }elseif(date('n') >= 3 && date('n') < 6){
        //     $semester_id =2;
        // }elseif(date('n') >= 6 && date('n') < 10){
        //     $semester_id =3;
        // }
        $getApplicantStatusLog = ApplicantStatusLog::where('user_id',Auth::id())->first();
        $getSemesterYearMappings = SemesterYearMapping::where('year','>=',date('Y'))->get();
        // $getSemesterYearMappings = SemesterYearMapping::where('year','>=',date('Y'))->where('semester_id',$semester_id)->get();
        $getOfferProgrammes = ProgrammeRecord::where('semester_year_mapping_id',$getSemesterYearMappings[0]->id)->get();
        if($getApplicantStatusLog->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')){
            return view('oas.programme_selection.home', compact('getSemesterYearMappings','getOfferProgrammes'));
        }else{
            return redirect()->route('home');
        }
    }
    /*
    |-----------------------------------
    | Create function
    |-----------------------------------
    */
    public function create()
    {
        $r = request();
        $getApplicantStatusLog = ApplicantStatusLog::where('user_id',Auth::id())->first();
        $getApplicantProfileId = $getApplicantStatusLog->applicant_profile_id;
        $choicePriorities = array(config('constants.CHOICE_PRIORITY.FIRST_CHOICE'),config('constants.CHOICE_PRIORITY.SECOND_CHOICE'),config('constants.CHOICE_PRIORITY.THIRD_CHOICE'));
        $now = DB::raw('CURRENT_TIMESTAMP');
        $getAllPostgraduateProgrammeId = $r->postgraduate_programme_id;
        $getAllUndergraduateProgrammeId = $r->undergraduate_programme_id;

        $getApplicationRecordId = ApplicationRecord::insertGetId([
            'user_id' => Auth::id(),
            'applicant_profile_id' => $getApplicantProfileId,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        if($getAllUndergraduateProgrammeId == null){
            for($i=0; $i<sizeof($choicePriorities); $i++){
                ProgrammePicked::create([
                    'application_record_id' => $getApplicationRecordId,
                    'programme_record_id' => $getAllPostgraduateProgrammeId[$i],
                    'choice_priority_id' => $choicePriorities[$i],
                ]);
            }
        }elseif($getAllPostgraduateProgrammeId == null){
            for($i=0; $i<sizeof($choicePriorities); $i++){
                ProgrammePicked::create([
                    'application_record_id' => $getApplicationRecordId,
                    'programme_record_id' => $getAllUndergraduateProgrammeId[$i],
                    'choice_priority_id' => $choicePriorities[$i],
                ]);
            }
        }

        $getApplicationStatusLogId = ApplicationStatusLog::create([
            'user_id' => Auth::id(),
            'application_record_id' => $getApplicationRecordId,
            'application_status_id' => config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION'),
        ]);
        
        return redirect()->route('academicDetail.home',['id'=> Crypt::encrypt($getApplicationRecordId)]);
    }
    /*
    |-----------------------------------
    | Update function
    |-----------------------------------
    */
    public function update($id){
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $choicePriorities = array(config('constants.CHOICE_PRIORITY.FIRST_CHOICE'),config('constants.CHOICE_PRIORITY.SECOND_CHOICE'),config('constants.CHOICE_PRIORITY.THIRD_CHOICE'));
        $r = request();
        $getProgrammePicked = ProgrammePicked::where('application_record_id',$APPLICATION_RECORD_ID)->get();
        $getAllPostgraduateProgrammeId = $r->postgraduate_programme_id;
        $getAllUndergraduateProgrammeId = $r->undergraduate_programme_id;
        if($getAllUndergraduateProgrammeId == null){
            for($i=0; $i<sizeof($choicePriorities); $i++){
                $getProgrammePicked[$i]->programme_record_id = $getAllPostgraduateProgrammeId[$i];
                $getProgrammePicked[$i]->choice_priority_id = $choicePriorities[$i];
                $getProgrammePicked[$i]->save();
            }
        }elseif($getAllPostgraduateProgrammeId == null){
            for($i=0; $i<sizeof($choicePriorities); $i++){
                $getProgrammePicked[$i]->programme_record_id = $getAllUndergraduateProgrammeId[$i];
                $getProgrammePicked[$i]->choice_priority_id = $choicePriorities[$i];
                $getProgrammePicked[$i]->save();
            }
        }
        return back();
    }

    // public function test(Request $request){
    //     $data = ProgrammeRecord::where('semester_year_mapping_id',$request->id)->get();
    //     return response()->json($data);
    // }
}
