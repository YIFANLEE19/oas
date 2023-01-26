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
        $schoolLevel = SchoolLevel::all();
        $application_status_log_id = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        return view('oas.academic_detail.home', compact('schoolLevel','APPLICATION_RECORD_ID'));
        // if ($application_status_log_id == null) {
        //     return redirect()->route('home');
        // } else {
        //     $application_status_id = $application_status_log_id->application_status_id;
        //     return view('oas.academic_detail.home', compact('application_status_id', 'schoolLevel','APPLICATION_RECORD_ID'));
        // }
    }
    /**
     * create new SchoolLevel function
     */
    public function create($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $COMPLETEACADEMICRECORD = 6;
        $SECONDARY = 1;
        $UPPERSECONDARY = 2;
        $FOUNDATION = 3;
        $DIPLOMA = 4;
        $DEGREE = 5;
        $PHD = 6;
        $MASTER = 7;
        $OTHER = 8;

        $r = request();

        // if (
        //     $r->s_school_name == null && $r->s_school_graduation == null && $r->us_school_name == null
        //     && $r->us_school_graduation == null && $r->f_school_name == null && $r->f_school_graduation == null
        //     && $r->di_school_name == null && $r->di_school_graduation == null && $r->de_school_name == null
        //     && $r->de_school_graduation == null && $r->m_school_name == null && $r->m_school_graduation == null
        //     && $r->p_school_name == null && $r->p_school_graduation == null && $r->o_school_name == null
        //     && $r->o_school_graduation == null
        // ){
        //     Session::flash('error', 'Please key in at least one school level information.');
        //     return back();
        // }

        if( ($r->s_school_name == null || $r->s_school_graduation == null) &&
            ($r->f_school_name == null || $r->f_school_graduation == null) && 
            ($r->di_school_name == null || $r->di_school_graduation == null) &&
            ($r->de_school_name == null || $r->de_school_graduation == null) &&
            ($r->p_school_name == null || $r->p_school_graduation == null) &&
            ($r->us_school_name == null || $r->us_school_graduation == null) &&
            ($r->o_school_name == null || $r->o_school_graduation == null)
            )
        {
            Session::flash('error', 'Please key in at least one school level information.');
            return back();
        }

        $createSecondary = AcademicRecord::create([
            'school_level_id' => $SECONDARY,
            'school_name' => $r->s_school_name,
            'school_graduation' => $r->s_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);

        $createUpperSecondary = AcademicRecord::create([
            'school_level_id' => $UPPERSECONDARY,
            'school_name' => $r->us_school_name,
            'school_graduation' => $r->us_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);

        $createFoundation = AcademicRecord::create([
            'school_level_id' => $FOUNDATION,
            'school_name' => $r->f_school_name,
            'school_graduation' => $r->f_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);

        $createDiploma = AcademicRecord::create([
            'school_level_id' => $DIPLOMA,
            'school_name' => $r->di_school_name,
            'school_graduation' => $r->di_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);

        $createDegree = AcademicRecord::create([
            'school_level_id' => $DEGREE,
            'school_name' => $r->de_school_name,
            'school_graduation' => $r->de_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);

        $createPhd = AcademicRecord::create([
            'school_level_id' => $PHD,
            'school_name' => $r->p_school_name,
            'school_graduation' => $r->p_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);

        $createMaster = AcademicRecord::create([
            'school_level_id' => $MASTER,
            'school_name' => $r->m_school_name,
            'school_graduation' => $r->m_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);


        $createOther = AcademicRecord::create([
            'school_level_id' => $OTHER,
            'school_name' => $r->o_school_name,
            'school_graduation' => $r->o_school_graduation,
            'application_record_id' => $APPLICATION_RECORD_ID,
        ]);

        $find_application_status_log = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        if ($find_application_status_log != null) {
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $COMPLETEACADEMICRECORD;
            $application_status_log->save();
        }

        Session::flash('application_status_id', $COMPLETEACADEMICRECORD);
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
