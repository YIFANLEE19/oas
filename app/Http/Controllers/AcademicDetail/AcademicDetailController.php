<?php

namespace App\Http\Controllers\AcademicDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicDetail;
use App\Models\ApplicationRecord;
use App\Models\AcademicRecord;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\SchoolLevel;
use App\Models\ApplicationStatusLog;
use Auth;
use Session;
use Illuminate\Support\Facades\Crypt;

class AcademicDetailController extends Controller
{

    public function index($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $school_level = SchoolLevel::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $application_status_log_id = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        return view('oas.academic_detail.home', compact('school_level','APPLICATION_RECORD_ID','application_status_log_id'));
    }
    /**
     * create new SchoolLevel function
     */
    public function create($id)
    {
        $r = request();

        // get application record id
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $SCHOOL_LEVEL = array(config('constants.SCHOOL_LEVEL.SECONDARY'),config('constants.SCHOOL_LEVEL.UPPERSECONDARY'),config('constants.SCHOOL_LEVEL.FOUNDATION'),config('constants.SCHOOL_LEVEL.DIPLOMA'),config('constants.SCHOOL_LEVEL.DEGREE'),config('constants.SCHOOL_LEVEL.PHD'),config('constants.SCHOOL_LEVEL.MASTER'),config('constants.SCHOOL_LEVEL.OTHER'));

        $getAllSchoolName = $r->school_name;
        $getAllSchoolGraduation = $r->school_graduation;

        $seenPair = false;
        // validation
        for ($i=0; $i < count($getAllSchoolName); $i++) {
            if($getAllSchoolName[$i] != null && $getAllSchoolGraduation[$i] != null){
                $seenPair = true;
            }
            else if($getAllSchoolName[$i] == null xor $getAllSchoolGraduation[$i] == null){
                Session::flash('error', 'Please enter school name/graduation date.');
                return back();
            } 
        }
        if(!$seenPair) {
            Session::flash('error', 'Please key in a school name and graduation date information.');
            return back();
        }

        for ($i=0; $i < count($SCHOOL_LEVEL); $i++) { 
            AcademicRecord::create([
                'school_level_id' => $SCHOOL_LEVEL[$i],
                'school_name' => $getAllSchoolName[$i],
                'school_graduation' => $getAllSchoolGraduation[$i],
                'application_record_id' => $APPLICATION_RECORD_ID,
                'status' => ($getAllSchoolName[$i] == null ? 0 : 1),
            ]);
        }

        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        $getApplicationStatusLog->application_status_id = config('constants.APPLICATION_STATUS_CODE.COMPLETE_ACADEMIC_DETAIL');
        $getApplicationStatusLog->save();

        $data = [
            'application_status_id' => config('constants.APPLICATION_STATUS_CODE.COMPLETE_ACADEMIC_DETAIL'),
            'application_record_id' => Crypt::encrypt($APPLICATION_RECORD_ID),
        ];

        Session::flash('data', $data);
        return back();

    }

    public function update($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $r = request();

        $getSelectedAcademicRecord = AcademicRecord::where('application_record_id', $APPLICATION_RECORD_ID)->get();

        $getAllSchoolLevelId = $r->school_level_id;
        $getAllSchoolName = $r->school_name;
        $getAllSchoolGraduation = $r->school_graduation;

        for ($i=0; $i < count($getAllSchoolLevelId); $i++) { 
            $getSelectedAcademicRecord[$i]->school_name = $getAllSchoolName[$i];
            $getSelectedAcademicRecord[$i]->school_graduation = $getAllSchoolGraduation[$i];
            $getSelectedAcademicRecord[$i]->status = ($getAllSchoolName[$i] == null?0:1);
            $getSelectedAcademicRecord[$i]->save();
        }

        return back();
    }
}
