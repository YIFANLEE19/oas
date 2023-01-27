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

    public function view()
    {
        $applicationRecord = ApplicationRecord::where('user_id', Auth::id())->first();
        $application_status_log_id = ApplicationStatusLog::where('user_id', Auth::id())->first();
        if ($applicationRecord == null || $application_status_log_id == null) {
            $application_status_id = 0;
            return redirect()->route('home');
        } else {
            $application_status_id = $application_status_log_id->application_status_id;
            if ($application_status_id != 6 && $application_status_id < 6) {
                return redirect()->route('home');
            }
        }
        $applicant_application_id = $applicationRecord->id;
        $academicRecord = AcademicRecord::where('application_record_id', $applicant_application_id)->get();

        // if user profile 
        if ($applicationRecord != null) {
            return view('oas.academic_detail.view', compact('academicRecord'));
        }
    }

    public function update()
    {
        $r = request();
        $applicationRecord = ApplicationRecord::where('user_id', Auth::id())->first('id');
        $updateSecondary = AcademicRecord::where('school_level_id', 1)->where('application_record_id', $applicationRecord->id)->update(
            [
                'school_name' => $r->school_name[1],
                'school_graduation' => $r->school_graduation[1],
            ]
        );

        $updateUpperSecondary = AcademicRecord::where('school_level_id', 2)->where('application_record_id', $applicationRecord->id)->update([
            'school_name' => $r->school_name[2],
            'school_graduation' => $r->school_graduation[2],
        ]);

        $updateFoundation = AcademicRecord::where('school_level_id', 3)->where('application_record_id', $applicationRecord->id)->update([
            'school_name' => $r->school_name[3],
            'school_graduation' => $r->school_graduation[3],
        ]);

        $updateDiploma = AcademicRecord::where('school_level_id', 4)->where('application_record_id', $applicationRecord->id)->update([
            'school_name' => $r->school_name[4],
            'school_graduation' => $r->school_graduation[4],
        ]);

        $updateDegree = AcademicRecord::where('school_level_id', 5)->where('application_record_id', $applicationRecord->id)->update([
            'school_name' => $r->school_name[5],
            'school_graduation' => $r->school_graduation[5],
        ]);

        $updatePhd = AcademicRecord::where('school_level_id', 6)->where('application_record_id', $applicationRecord->id)->update([
            'school_name' => $r->school_name[6],
            'school_graduation' => $r->school_graduation[6],
        ]);

        $updateMaster = AcademicRecord::where('school_level_id', 7)->where('application_record_id', $applicationRecord->id)->update([
            'school_name' => $r->school_name[7],
            'school_graduation' => $r->school_graduation[7],
        ]);

        $updateOther = AcademicRecord::where('school_level_id', 8)->where('application_record_id', $applicationRecord->id)->update([
            'school_name' => $r->school_name[8],
            'school_graduation' => $r->school_graduation[8],
        ]);
        Session::flash('successAcademic', "Academic Record update Successful!");
        return redirect()->route('draft.home');
    }
}
