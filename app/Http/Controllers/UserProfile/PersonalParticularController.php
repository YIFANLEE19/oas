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
use App\Models\ApplicantStatusLog;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;

class PersonalParticularController extends Controller
{
    /*
    |-----------------------------------------------------------
    | undefined variable
    |-----------------------------------------------------------
    */
    private $finalIC;

    /*
    |-----------------------------------------------------------
    | Return step 1 personal particulars(form)
    | To get the active value in db, the status code is 1.
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
        $getRaces = Race::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getReligions = Religion::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getNationalities = Nationality::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getGenders = Gender::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getMaritals = Marital::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getCountries = Country::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        
        $data = [
            'races' => $getRaces,
            'religions' => $getReligions,
            'nationalities' => $getNationalities,
            'genders' => $getGenders,
            'maritals' => $getMaritals,
            'countries' => $getCountries,
        ];
        
        if($applicant_status_log != null && $applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')){
            return redirect()->route('home');
        }
        return view('oas.userProfile.personalParticulars', compact(['data','applicant_status_log']));
    }

    /*
    |-----------------------------------------------------------
    | The create function is store the data to database.
    | $finalIC is use to checking user input is passport or 
    | identiy card
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        dd('break');
        if($r->passport == ''){
            $this->finalIC = $r->ic1.'-'.$r->ic2.'-'.$r->ic3;
        }else{
            $this->finalIC = $r->passport;
        }

        $user_detail_id = UserDetail::insertGetId([
            'en_name' => $r->en_name,
            'ch_name' => $r->ch_name,
            'ic' => $this->finalIC,
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
            'address_type_id' => config('constants.ADDRESS_TYPE.CORRESPONDENCE'),
        ]);
        $p_address_mapping = AddressMapping::create([        
            'user_detail_id' => $user_detail_id,
            'address_id' => $p_address_id,
            'address_type_id' => config('constants.ADDRESS_TYPE.PERMANENT'),
        ]);
        $applicant_status_log = ApplicantStatusLog::create([
            'user_id' => Auth::id(),
            'applicant_profile_id' => $applicant_profile_id,
            'applicant_profile_status_id' => config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'),
        ]);
        // Session::flash('applicant_profile_status_code',config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PERSONAL_PARTICULARS'));
        return back();
    }

    /*
    |-----------------------------------------------------------
    | View function
    |-----------------------------------------------------------
    */
    public function view()
    {        
        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        if($applicant_status_log == null){
            return redirect()->route('home');
        }else{
            if($applicant_status_log->applicant_profile_status_id != config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')){
                return redirect()->route('home');
            }
        }

        $getRaces = Race::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getReligions = Religion::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getNationalities = Nationality::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getGenders = Gender::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getMaritals = Marital::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getCountries = Country::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();

        $data = [
            'races' => $getRaces,
            'religions' => $getReligions,
            'nationalities' => $getNationalities,
            'genders' => $getGenders,
            'maritals' => $getMaritals,
            'countries' => $getCountries,
        ];
        // get applicant profile
        $applicant_profile_id = $applicant_status_log->applicant_profile_id;
        $applicant_profile = ApplicantProfile::where('id',$applicant_profile_id)->first();

        // get user detail
        $user_detail_id = $applicant_profile->user_detail_id;
        $user_detail = UserDetail::where('id',$user_detail_id)->first();

        // get address
        $c_address_mapping = AddressMapping::where('user_detail_id',$user_detail_id)->where('address_type_id',config('constants.ADDRESS_TYPE.CORRESPONDENCE'))->first();
        $p_address_mapping = AddressMapping::where('user_detail_id',$user_detail_id)->where('address_type_id',config('constants.ADDRESS_TYPE.PERMANENT'))->first();
        $c_address_id = $c_address_mapping->address_id;
        $p_address_id = $p_address_mapping->address_id;
        $c_address = Address::where('id', $c_address_id)->first();
        $p_address = Address::where('id', $p_address_id)->first();
        
        return view('oas.userProfile.viewPersonalParticulars', compact(['applicant_profile','user_detail','c_address','p_address','data']));
    }

    /*
    |-----------------------------------------------------------
    | Update function
    |-----------------------------------------------------------
    */
    public function update()
    {
        $r = request();

        $USER_DETAIL_ID = $r->user_detail_id;
        $APPLICANT_PROFILE_ID = $r->applicant_profile_id;
        $C_ADDRESS_ID = $r->c_address_id;
        $P_ADDRESS_ID = $r->p_address_id;

        if($r->passport == ''){
            $this->finalIC = $r->ic1.'-'.$r->ic2.'-'.$r->ic3;
        }else{
            $this->finalIC = $r->passport;
        }

        $user_detail = UserDetail::find($USER_DETAIL_ID);
        $user_detail->en_name = $r->en_name;
        $user_detail->ch_name = $r->ch_name;
        $user_detail->ic = $this->finalIC;
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

        Session::flash('success','success');
        return back();
    }
}
