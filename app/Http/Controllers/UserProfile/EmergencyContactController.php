<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuardianRelationship;
use App\Models\UserDetail;
use App\Models\ApplicationRecord;
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
        $allRelationships = GuardianRelationship::all();
        return view('oas.userProfile.emergencyContact', compact(['allRelationships']));
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

        $emergency_contact_list1 = EmergencyContactList::create(
            [
                'applicant_profile_id' => $applicationRecord->applicant_profile_id,
                'emergency_contact_id' => $emergency_contact_id1,
            ],
            [
                'applicant_profile_id' => $applicationRecord->applicant_profile_id,
                'emergency_contact_id' => $emergency_contact_id2,
            ],
        );

        Session::flash('success','Your emergency contact created successfully.');
        return back();
    }
}
