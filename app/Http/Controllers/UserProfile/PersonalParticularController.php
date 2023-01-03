<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Models\Religion;
use App\Models\Nationality;
use App\Models\Gender;
use App\Models\Marital;
use App\Models\UserDetail;
use App\Models\ApplicantProfile;
use App\Models\ApplicationRecord;
use App\Models\AddressMapping;
use App\Models\Address;
use App\Models\Country;
use App\Models\ApplicationStatusLog;
use Illuminate\Http\Request;
use Auth;
use Session;

class PersonalParticularController extends Controller
{
    //    
    public function index()
    {
        // $application_status_id 0 == new user, haven't complete personal particulars.
        $allRaces = Race::all();
        $allReligions = Religion::all();
        $allNationalities = Nationality::all();
        $allGenders = Gender::all();
        $allMaritals = Marital::all();
        $allCountries = Country::all();
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($application_status_log_id == null){
            $application_status_id = 0;
            return view('oas.userProfile.personalParticulars', compact(['allRaces','allReligions','allNationalities','allGenders','allMaritals','allCountries','application_status_id']));
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            return view('oas.userProfile.personalParticulars', compact(['allRaces','allReligions','allNationalities','allGenders','allMaritals','allCountries','application_status_id']));
        }

    }

    /**
     * create personal particulars profile
     * 
     * code     - 1 correspondence address
     * code     - 2 permanent address
     */
    public function create()
    {
        $CORRESPONDENCE_ADDRESS_TYPE = 1;
        $PERMANENT_ADDRESS_TYPE = 2;
        $COMPLETEPERSONALPARTICULARS = 1;

        $r = request();
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
            'tel_h' => $r->tel_h,
            'tel_hp' => $r->tel_hp,
        ]);
        $applicant_profile_id = ApplicantProfile::insertGetId([
            'birth_date' => $r->birth_date,
            'place_of_birth' => $r->place_of_birth,
            'gender_id' => $r->gender_id,
            'marital_id' => $r->marital_id,
            'race_id' => $r->race_id,
            'nationality_id' => $r->nationality_id,
            'religion_id' => $r->religion_id,
            'user_detail_id' => $user_detail_id,
        ]);
        $application_record_id = ApplicationRecord::insertGetId([
            'user_id' => Auth::id(),
            'applicant_profile_id' => $applicant_profile_id,
        ]);
        $c_address_id = Address::insertGetId([
            'street1' => $r->c_street1,
            'street2' => $r->c_street2,
            'zipcode' => $r->c_zipcode,
            'city' => $r->c_city,
            'state' => $r->c_state,
            'country_id' => $r->c_country_id,
        ]);
        $p_address_id = Address::insertGetId([
            'street1' => $r->p_street1,
            'street2' => $r->p_street2,
            'zipcode' => $r->p_zipcode,
            'city' => $r->p_city,
            'state' => $r->p_state,
            'country_id' => $r->p_country_id,
        ]);
        $c_address_mapping = AddressMapping::create([
            'user_detail_id' => $user_detail_id,
            'address_id' => $c_address_id,
            'address_type_id' => $CORRESPONDENCE_ADDRESS_TYPE,
        ]);
        $p_address_mapping = AddressMapping::create([        
            'user_detail_id' => $user_detail_id,
            'address_id' => $p_address_id,
            'address_type_id' => $PERMANENT_ADDRESS_TYPE,
        ]);
        $application_status_log = ApplicationStatusLog::create([
            'user_id' => Auth::id(),
            'application_record_id' => $application_record_id,
            'application_status_id' => $COMPLETEPERSONALPARTICULARS,
        ]);
        Session::flash('application_status_id',$COMPLETEPERSONALPARTICULARS);
        return back();
    }

    /**
     * view function
     */
    public function view()
    {
        $CORRESPONDENCE_ADDRESS_TYPE = 1;
        $PERMANENT_ADDRESS_TYPE = 2;

        $allRaces = Race::all();
        $allReligions = Religion::all();
        $allNationalities = Nationality::all();
        $allGenders = Gender::all();
        $allMaritals = Marital::all();
        $allCountries = Country::all();

        // get user detail
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $applicant_profile_id = $applicationRecord->applicant_profile_id;
        $applicant_profile = ApplicantProfile::where('id',$applicant_profile_id)->first();
        $user_detail_id = $applicant_profile->user_detail_id;
        $user_detail = UserDetail::where('id',$user_detail_id)->first();
        // get address mapping
        $c_address_mapping = AddressMapping::where('user_detail_id',$user_detail_id)->where('address_type_id',$CORRESPONDENCE_ADDRESS_TYPE)->first();
        $p_address_mapping = AddressMapping::where('user_detail_id',$user_detail_id)->where('address_type_id',$PERMANENT_ADDRESS_TYPE)->first();
        $c_address_id = $c_address_mapping->address_id;
        $p_address_id = $p_address_mapping->address_id;

        $c_address = Address::where('id', $c_address_id)->first();
        $p_address = Address::where('id', $p_address_id)->first();
        // if user profile 
        if($applicationRecord != null){
            return view('oas.userProfile.viewPersonalParticulars', compact(['applicant_profile','user_detail','c_address','p_address','allRaces','allReligions','allNationalities','allGenders','allMaritals','allCountries']));
        }   
    }
    /**
     * update function
     */
    public function update()
    {
        $r = request();
        $USER_DETAIL_ID = $r->user_detail_id;
        $APPLICANT_PROFILE_ID = $r->applicant_profile_id;
        $C_ADDRESS_ID = $r->c_address_id;
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
        $user_detail->tel_h =  $r->tel_h;
        $user_detail->tel_hp = $r->tel_hp;

        $applicant_profile = ApplicantProfile::find($APPLICANT_PROFILE_ID);
        $applicant_profile->birth_date = $r->birth_date;
        $applicant_profile->place_of_birth = $r->place_of_birth;
        $applicant_profile->gender_id = $r->gender_id;
        $applicant_profile->marital_id = $r->marital_id;
        $applicant_profile->race_id = $r->race_id;
        $applicant_profile->nationality_id = $r->nationality_id;
        $applicant_profile->religion_id = $r->religion_id;
        $applicant_profile->user_detail_id = $USER_DETAIL_ID;

        $c_address = Address::find($C_ADDRESS_ID);
        $c_address->street1 = $r->c_street1;
        $c_address->street2 = $r->c_street2;
        $c_address->zipcode = $r->c_zipcode;
        $c_address->city = $r->c_city;
        $c_address->state = $r->c_state;
        $c_address->country_id = $r->c_country_id;

        $p_address = Address::find($P_ADDRESS_ID);
        $p_address->street1 = $r->p_street1;
        $p_address->street2 = $r->p_street2;
        $p_address->zipcode = $r->p_zipcode;
        $p_address->city = $r->p_city;
        $p_address->state = $r->p_state;
        $p_address->country_id = $r->p_country_id;

        $user_detail->save();
        $applicant_profile->save();
        $c_address->save();
        $p_address->save();

        return back();
    }
}
