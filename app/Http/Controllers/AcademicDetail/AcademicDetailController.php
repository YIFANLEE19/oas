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
    /**
     * Return academic details page that can let applicant insert their academic details.
     * The url argument must specify an absolute 
     * <a href="{{ route('academicDetail.home',['id'=>Crypt::encypt(applicationRecordId)]) }}"></a>
     * This method will return all the school's level where status is active and the 
     * application status log.
     * 
     * @param id encrypted application record id
     */
    public function index($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $school_level = SchoolLevel::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $application_status_log = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        if($application_status_log->application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION')){
            return view('oas.academic_detail.home', compact('school_level','APPLICATION_RECORD_ID'));
        }
        return redirect()->route('home');
    }
    /**
     * Store the academic details in to databases using AcademicRecord models
     * This method will store all the school's level data into databases, it's 
     * required to insert at least one pair of data.
     * If not fulfill the requirements it will return the error message through 
     * the Session::flash('key','value').
     * 
     * @param id encrypted application record id
     */
    /**
     * #TODO1: only store the filled data
     */
    public function create($id)
    {
        $r = request();
        // used to validate the data
        $seenPair = false;
        // get all data
        $getAllSchoolName = $r->school_name;
        $getAllSchoolGraduation = $r->school_graduation;
        // decrypt application record id
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        if($getApplicationStatusLog->application_status_id != config('constants.APPLICATION_STATUS_CODE.COMPLETE_PROGRAM_SELECTION')){
            return redirect()->route('home');
        }
        // array for storing all school level id
        $SCHOOL_LEVEL = array(config('constants.SCHOOL_LEVEL.SECONDARY'),config('constants.SCHOOL_LEVEL.UPPERSECONDARY'),config('constants.SCHOOL_LEVEL.FOUNDATION'),config('constants.SCHOOL_LEVEL.DIPLOMA'),config('constants.SCHOOL_LEVEL.DEGREE'),config('constants.SCHOOL_LEVEL.PHD'),config('constants.SCHOOL_LEVEL.MASTER'),config('constants.SCHOOL_LEVEL.OTHER'));
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
        // store the academic record to database
        for ($i=0; $i < count($SCHOOL_LEVEL); $i++) { 
            AcademicRecord::create([
                'school_level_id' => $SCHOOL_LEVEL[$i],
                'school_name' => $getAllSchoolName[$i],
                'school_graduation' => $getAllSchoolGraduation[$i],
                'application_record_id' => $APPLICATION_RECORD_ID,
                'status' => ($getAllSchoolName[$i] == null ? 0 : 1),
            ]);
        }
        // update the application status
        $getApplicationStatusLog->application_status_id = config('constants.APPLICATION_STATUS_CODE.COMPLETE_ACADEMIC_DETAIL');
        $getApplicationStatusLog->save();
        return redirect()->route('statusOfHealth.home',['id'=> Crypt::encrypt($APPLICATION_RECORD_ID)]);
    }
    /**
     * This method can let users update the academic details.
     * 
     * @param id encrypted application record id
     */
    /**
     * #TODO1: try using updateOrInsert() function
     */
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
