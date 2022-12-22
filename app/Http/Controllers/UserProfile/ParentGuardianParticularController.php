<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\GuardianRelationship;
use App\Models\Nationality;
use App\Models\Income;
use App\Models\ApplicationRecord;
use App\Models\GuardianDetail;
use App\Models\UserDetail;
use App\Models\Address;
use App\Models\AddressMapping;
use App\Models\ApplicantGuardianList;
use Illuminate\Http\Request;
use Auth;
use Session;

class ParentGuardianParticularController extends Controller
{
    //
    public function index()
    {
        $allRelationships = GuardianRelationship::all();
        $allNationalities = Nationality::all();
        $allIncomes = Income::all();
        return view('oas.userProfile.parentGuardianParticulars', compact(['allRelationships','allNationalities','allIncomes']));
    }

    /**
     * create function
     */
    public function create()
    {
        $r = request();

        // get user applicant profile id 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');

        $user_detail_id = UserDetail::insertGetId([
            'en_name' => $r->en_name,
            'ch_name' => $r->ch_name,
            'ic' => $r->ic,
            'email' => $r->email,
            'tel_hp' => $r->tel_hp,
        ]);

        $guardian_detail_id = GuardianDetail::insertGetId([
            'occupation' => $r->occupation,
            'income_id' => $r->income_id,
            'guardian_relationship_id' => $r->guardian_relationship_id,
            'nationality_id' => $r->nationality_id,
            'user_detail_id' => $user_detail_id,
        ]);
        $address_id = Address::insertGetId([
            'street1' => $r->p_street1,
            'street2' => $r->p_street2,
            'zipcode' => $r->p_zipcode,
            'city' => $r->p_city,
            'state' => $r->p_state,
            'country' => $r->p_country,
            'address_type_id' => 2,
        ]);
        $address_mapping = AddressMapping::create([
            'user_detail_id' => $user_detail_id,
            'address_id' => $address_id,
        ]);
        $applicant_guardian_list = ApplicantGuardianList::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'guardian_detail_id' => $guardian_detail_id,
        ]);
        Session::flash('success','Your guardian particulars created successfully.');
        return back();
    }
}
