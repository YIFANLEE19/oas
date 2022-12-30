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
use App\Models\Country;
use App\Models\ApplicantGuardianList;
use Illuminate\Http\Request;
use Auth;
use Session;

class ParentGuardianParticularController extends Controller
{
    //
    public function index()
    {
        // code - 0 = personal particulars X
        //      - 1 = personal particulars / AND parent guardian particulars X
        //      - 2 = personal particulars / AND parent guardian particulars /
        $status_code;
        $allRelationships = GuardianRelationship::all();
        $allNationalities = Nationality::all();
        $allIncomes = Income::all();
        $allCountries = Country::all();

        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        if($applicationRecord == null){
            $status_code = 0;
            return view('oas.userProfile.parentGuardianParticulars', compact(['allRelationships','allNationalities','allIncomes','allCountries','status_code']));
        }else{
            $applicant_profile_id = $applicationRecord->applicant_profile_id;
            $applicant_guardian_list_check = ApplicantGuardianList::where('applicant_profile_id',$applicant_profile_id)->first();
            if($applicant_guardian_list_check == null){
                $status_code = 1;
                return view('oas.userProfile.parentGuardianParticulars', compact(['allRelationships','allNationalities','allIncomes','allCountries','status_code']));
            }else{
                $status_code = 2;
                return view('oas.userProfile.parentGuardianParticulars', compact(['allRelationships','allNationalities','allIncomes','allCountries','status_code']));
            }
        }
    }

    /**
     * create function
     * code     - 2 permanent address
     */
    public function create()
    {
        $PERMANENT_ADDRESS_TYPE = 2;

        $r = request();
        // get user applicant profile id 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        // check ic or passport
        $finalIc;
        if($r->passport == ''){
            $finalIc = $r->ic1.'-'.$r->ic2.'-'.$r->ic3;
        }else{
            $finalIc = $r->passport;
        }

        $user_detail_id = UserDetail::insertGetId([
            'en_name' => $r->en_name,
            'ch_name' => $r->ch_name,
            'ic' => $finalIc,
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
            'country_id' => $r->p_country_id,
        ]);
        $address_mapping = AddressMapping::create([
            'user_detail_id' => $user_detail_id,
            'address_id' => $address_id,
            'address_type_id' => $PERMANENT_ADDRESS_TYPE,
        ]);
        $applicant_guardian_list = ApplicantGuardianList::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'guardian_detail_id' => $guardian_detail_id,
        ]);
        Session::flash('status_code',2);
        return back();
    }

    /**
     * view function
     */
    public function view()
    {
        $PERMANENT_ADDRESS_TYPE = 2;

        $allRelationships = GuardianRelationship::all();
        $allNationalities = Nationality::all();
        $allIncomes = Income::all();
        $allCountries = Country::all();

        // get -> applicant profile id -> applicant guardian list -> guardian detail -> user detail
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $applicant_profile_id = $applicationRecord->applicant_profile_id;
        $applicant_guardian_list = ApplicantGuardianList::where('applicant_profile_id',$applicant_profile_id)->first();
        $guardian_detail_id = $applicant_guardian_list->guardian_detail_id;
        $guardian_detail = GuardianDetail::where('id',$guardian_detail_id)->first();
        $user_detail_id = $guardian_detail->user_detail_id;
        $user_detail = UserDetail::where('id',$user_detail_id)->first();
        // address
        $p_address_mapping = AddressMapping::where('user_detail_id',$user_detail_id)->where('address_type_id',$PERMANENT_ADDRESS_TYPE)->first();
        $p_address_id = $p_address_mapping->address_id;
        $p_address = Address::where('id', $p_address_id)->first();

        return view('oas.userProfile.viewParentGuardianParticulars', compact(['user_detail','guardian_detail','p_address','allRelationships','allNationalities','allIncomes','allCountries']));
    }
    /**
     * update function
     */
    public function update()
    {
        $r = request();
        $USER_DETAIL_ID = $r->user_detail_id;
        $GUARDIAN_DETAIL_ID = $r->guardian_detail_id;
        $P_ADDRESS_ID = $r->p_address_id;
        // check ic or passport
        $finalIc;
        if($r->passport == ''){
            $finalIc = $r->ic1.'-'.$r->ic2.'-'.$r->ic3;
        }else{
            $finalIc = $r->passport;
        }

        $user_detail = UserDetail::find($USER_DETAIL_ID);
        $user_detail->en_name = $r->en_name;
        $user_detail->ch_name = $r->ch_name;
        $user_detail->ic = $finalIc;
        $user_detail->email = $r->email;
        $user_detail->tel_hp = $r->tel_hp;

        $guardian_detail = GuardianDetail::find($GUARDIAN_DETAIL_ID);
        $guardian_detail->occupation = $r->occupation;
        $guardian_detail->income_id = $r->income_id;
        $guardian_detail->guardian_relationship_id = $r->guardian_relationship_id;
        $guardian_detail->nationality_id = $r->nationality_id;
        $guardian_detail->user_detail_id = $USER_DETAIL_ID;

        $p_address = Address::find($P_ADDRESS_ID);
        $p_address->street1 = $r->p_street1;
        $p_address->street2 = $r->p_street2;
        $p_address->zipcode = $r->p_zipcode;
        $p_address->city = $r->p_city;
        $p_address->state = $r->p_state;
        $p_address->country_id = $r->p_country_id;

        $user_detail->save();
        $guardian_detail->save();
        $p_address->save();

        return back();
    }
}
