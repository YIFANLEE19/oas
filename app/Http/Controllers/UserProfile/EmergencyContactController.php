<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuardianRelationship;
use App\Models\UserDetail;
use App\Models\ApplicationRecord;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContact;
use App\Models\EmergencyContactList;
use App\Models\ApplicationStatusLog;
use Auth;
use Session;
use DB;

class EmergencyContactController extends Controller
{
    //
    public function index()
    {
        $status_code;
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $allRelationships = GuardianRelationship::all();
        $application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($application_status_log == null){
            $application_status_id = 0;
            return view('oas.userProfile.emergencyContact', compact(['allRelationships','application_status_id']));
        }else{
            $application_status_id = $application_status_log->application_status_id;
            return view('oas.userProfile.emergencyContact', compact(['allRelationships','application_status_id']));
        }
    }
    /**
     * create function
     */
    public function create()
    {

        $COMPLETEEMERGENCYCONTACT = 3;
        $r = request();

        // get user applicant profile id 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');

        $user_detail_id1 = UserDetail::insertGetId([
            'en_name' => $r->en_name1,
            'ch_name' => $r->ch_name1,
            'tel_hp' => $r->tel_hp1,
        ]);
        $user_detail_id2 = UserDetail::insertGetId([
            'en_name' => $r->en_name2,
            'ch_name' => $r->ch_name2,
            'tel_hp' => $r->tel_hp2,
        ]);
        $emergency_contact_id1 = EmergencyContact::insertGetId([
            'guardian_relationship_id' => $r->guardian_relationship_id1,
            'user_detail_id' => $user_detail_id1,
        ]);
        $emergency_contact_id2 = EmergencyContact::insertGetId([
            'guardian_relationship_id' => $r->guardian_relationship_id2,
            'user_detail_id' => $user_detail_id2,
        ]);

        $emergency_contact_list1 = EmergencyContactList::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'emergency_contact_id' => $emergency_contact_id1,
        ]);
        $emergency_contact_list2 = EmergencyContactList::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'emergency_contact_id' => $emergency_contact_id2,
        ]);
        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($find_application_status_log != null){
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $COMPLETEEMERGENCYCONTACT;
            $application_status_log->save();
        }
        Session::flash('application_status_id',$COMPLETEEMERGENCYCONTACT);
        return back();
    }

    /**
     * view function
     */
    public function view()
    {
        $allRelationships = GuardianRelationship::all();
        // get user applicant profile id 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($applicationRecord == null || $application_status_log_id == null){
            return redirect()->route('home');
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            if($application_status_id != 4 && $application_status_id < 4){
                return redirect()->route('home');
            }
        }
        $applicant_profile_id = $applicationRecord->applicant_profile_id;
        $emergency_contact_lists = EmergencyContactList::where('applicant_profile_id',$applicant_profile_id)->get();
        $emergency_contact_id1 = $emergency_contact_lists[0]->emergency_contact_id;
        $emergency_contact_id2 = $emergency_contact_lists[1]->emergency_contact_id;
        $emergency_contact1 = EmergencyContact::where('id',$emergency_contact_id1)->first();
        $emergency_contact2 = EmergencyContact::where('id',$emergency_contact_id2)->first();
        $user_detail_id1 = $emergency_contact1->user_detail_id;
        $user_detail_id2 = $emergency_contact2->user_detail_id;
        $user_detail1 = UserDetail::where('id',$user_detail_id1)->first();
        $user_detail2 = UserDetail::where('id',$user_detail_id2)->first();

        return view('oas.userProfile.viewEmergencyContact', compact(['emergency_contact1','emergency_contact2','user_detail1','user_detail2','allRelationships']));
    }

    /**
     * update function
     */
    public function update()
    {
        $r = request();
        $USER_DETAIL_ID1 = $r->user_detail_id1;
        $USER_DETAIL_ID2 = $r->user_detail_id2;
        $EMERGENCY_CONTACT_ID1 = $r->emergency_contact_id1;
        $EMERGENCY_CONTACT_ID2 = $r->emergency_contact_id2;

        $emergency_contact1 = EmergencyContact::find($EMERGENCY_CONTACT_ID1);
        $emergency_contact1->guardian_relationship_id = $r->guardian_relationship_id1;
        $emergency_contact1->user_detail_id = $USER_DETAIL_ID1;

        $emergency_contact2 = EmergencyContact::find($EMERGENCY_CONTACT_ID2);
        $emergency_contact2->guardian_relationship_id = $r->guardian_relationship_id2;
        $emergency_contact2->user_detail_id = $USER_DETAIL_ID2;

        $user_detail1 = UserDetail::find($USER_DETAIL_ID1);
        $user_detail1->en_name = $r->en_name1;
        $user_detail1->ch_name = $r->ch_name1;
        $user_detail1->tel_hp = $r->tel_hp1;

        $user_detail2 = UserDetail::find($USER_DETAIL_ID2);
        $user_detail2->en_name = $r->en_name2;
        $user_detail2->ch_name = $r->ch_name2;
        $user_detail2->tel_hp = $r->tel_hp2;

        $emergency_contact1->save();
        $user_detail1->save();
        $emergency_contact2->save();
        $user_detail2->save();

        Session::flash('success','success');
        return back();
    }
}
