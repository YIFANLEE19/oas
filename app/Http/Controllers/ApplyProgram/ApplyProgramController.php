<?php

namespace App\Http\Controllers\ApplyProgram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationRecord;
use App\Models\ApplicationStatusLog;
use App\Models\ApplicantStatusLog;
use App\Models\SemesterYearMapping;
use App\Models\ProgrammeRecord;

use Auth;

class ApplyProgramController extends Controller
{
    //
    public function index()
    {
        /*
        |-----------------------------------
        | create new application record and application status log
        |-----------------------------------
        */
        // $get_old_application_record = ApplicationRecord::where('user_id',Auth::id())->get();
        // $old_applicant_profile_id = $get_old_application_record[0]->applicant_profile_id;

        // $new_application_record_id = ApplicationRecord::insertGetId([
        //     'user_id' => Auth::id(),
        //     'applicant_profile_id' => $old_applicant_profile_id,
        // ]);
        // $application_status_log = ApplicationStatusLog::create([
        //     'user_id' => Auth::id(),
        //     'application_record_id' => $new_application_record_id,
        //     'application_status_id' => config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROFILE_PICTURE'),
        // ]);

        // $getApplicantProfileId = ApplicantStatusLog::where('user_id',Auth::id())->get();
        // $getApplicationRecordId = ApplicationRecord::insertGetId([
        //     'user_id' => Auth::id(),
        //     'applicant_profile_id' => $getApplicantProfileId->applicant_profile_id,
        // ]);
        // $createApplicationStatusLog = ApplicationStatusLog::create([
        //     'user_id' => Auth::id(),
        //     'application_record_id' => $getApplicationRecordId,
        //     'application_status_id' => config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION'),
        // ]);

        //get intake semester year mapping
        // dd(date('n'));
        $semester_id;
        if(date('n') < 3){
            $semester_id =1;
        }elseif(date('n') >= 3 && date('n') < 6){
            $semester_id =2;
        }elseif(date('n') >= 6 && date('n') < 10){
            $semester_id =3;
        }
        $getSemesterYearMappings = SemesterYearMapping::where('year','>=',date('Y'))->where('semester_id',$semester_id)->get();

        $getOfferProgrammes = ProgrammeRecord::where('semester_year_mapping_id',$getSemesterYearMappings[0]->id)->get();

        return view('oas.programme_selection.home', compact('getSemesterYearMappings','getOfferProgrammes'));
    }
}
