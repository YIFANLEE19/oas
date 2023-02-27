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
use App\Models\ApplicantStatusLog;
use Auth;
use Session;
use DB;

class EmergencyContactController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return step 1 emergency contact(form)
    | application_status_id = 0, means it is personal particulars
    | not yet finish to fill in.
    |
    | if application_status_log equal null then   
    |   return application_status_id = 0, means new user
    | else 
    |   return application_status_id
    |
    |-----------------------------------------------------------
    */
    public function index()
    {
        $allRelationships = GuardianRelationship::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        if($applicant_status_log != null && $applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')){
            return redirect()->route('home');
        }
        return view('oas.userProfile.emergencyContact', compact(['allRelationships','applicant_status_log']));
    }

    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();

        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();

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
            'applicant_profile_id' => $applicant_status_log->applicant_profile_id,
            'emergency_contact_id' => $emergency_contact_id1,
        ]);
        $emergency_contact_list2 = EmergencyContactList::create([
            'applicant_profile_id' => $applicant_status_log->applicant_profile_id,
            'emergency_contact_id' => $emergency_contact_id2,
        ]);
        $applicant_status_log->applicant_profile_status_id = config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_EMERGENCY_CONTACT');
        $applicant_status_log->save();
        return back();
    }

    /**
     * view function
     */
    public function view()
    {
        $allRelationships = GuardianRelationship::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        if($applicant_status_log == null){
            return redirect()->route('home');
        }else{
            if($applicant_status_log->applicant_profile_status_id != config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')){
                return redirect()->route('home');
            }
        }
        $emergency_contact_lists = EmergencyContactList::where('applicant_profile_id',$applicant_status_log->applicant_profile_id)->get();
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
