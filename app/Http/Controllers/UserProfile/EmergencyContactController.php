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
use Auth;
use Session;
use DB;

class EmergencyContactController extends Controller
{
    //
    public function index()
    {
        // code - 0 = personal particulars X
        //      - 1 = personal particulars / AND parent guardian particulars X
        //      - 2 = personal particulars / AND parent guardian particulars / AND emergency contact X
        //      - 3 = personal particulars / AND parent guardian particulars / AND emergency contact /
        $status_code;
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $allRelationships = GuardianRelationship::all();
        if($applicationRecord == null){
            $status_code = 0;
            return view('oas.userProfile.emergencyContact', compact(['allRelationships','status_code']));
        }else{  
            $applicant_profile_id = $applicationRecord->applicant_profile_id;
            $applicant_guardian_list_check = ApplicantGuardianList::where('applicant_profile_id',$applicant_profile_id)->first();
            if($applicant_guardian_list_check == null){
                $status_code = 1;
                return view('oas.userProfile.emergencyContact', compact(['allRelationships','status_code']));
            }else{
                $emergency_contact_list_check = EmergencyContactList::where('applicant_profile_id',$applicant_profile_id)->first();
                if($emergency_contact_list_check == null){
                    $status_code = 2;
                    return view('oas.userProfile.emergencyContact', compact(['allRelationships','status_code']));
                }else{
                    $status_code = 3;
                    return view('oas.userProfile.emergencyContact', compact(['allRelationships','status_code']));
                }
            }
        }
    }
    /**
     * create function
     */
    public function create()
    {
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
        Session::flash('status_code',3);
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

        return back();
    }
}
