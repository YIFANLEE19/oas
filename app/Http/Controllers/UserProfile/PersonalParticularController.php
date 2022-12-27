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
use Illuminate\Http\Request;
use Auth;
use Session;

class PersonalParticularController extends Controller
{
    //    
    public function index()
    {
        // code - 0 = new user
        //      - 1 = submitted 
        $status_code;
        $allRaces = Race::all();
        $allReligions = Religion::all();
        $allNationalities = Nationality::all();
        $allGenders = Gender::all();
        $allMaritals = Marital::all();
        $allCountries = Country::all();
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        if($applicationRecord == null){
            $status_code = 0;
            return view('oas.userProfile.personalParticulars', compact(['allRaces','allReligions','allNationalities','allGenders','allMaritals','allCountries','status_code']));
        }else{
            $status_code = 1;
            return view('oas.userProfile.personalParticulars', compact(['allRaces','allReligions','allNationalities','allGenders','allMaritals','allCountries','status_code']));
        }

    }

    /**
     * create personal particulars profile
     */
    public function create()
    {
        $r = request();
        $user_detail_id = UserDetail::insertGetId([
            'en_name' => $r->en_name,
            'ch_name' => $r->ch_name,
            'ic' => $r->ic,
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
            'address_type_id' => 1,
        ]);
        $p_address_id = Address::insertGetId([
            'street1' => $r->p_street1,
            'street2' => $r->p_street2,
            'zipcode' => $r->p_zipcode,
            'city' => $r->p_city,
            'state' => $r->p_state,
            'country_id' => $r->p_country_id,
            'address_type_id' => 2,
        ]);
        $c_address_mapping = AddressMapping::create([
            'user_detail_id' => $user_detail_id,
            'address_id' => $c_address_id,
        ]);
        $p_address_mapping = AddressMapping::create([        
            'user_detail_id' => $user_detail_id,
            'address_id' => $p_address_id,
        ]);
        Session::flash('status_code',1);
        return back();
    }

    /**
     * view function
     */
    public function view()
    {
        // get user detail
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $applicant_profile_id = $applicationRecord->applicant_profile_id;
        $applicant_profile = ApplicantProfile::where('id',$applicant_profile_id)->first();
        $user_detail_id = $applicant_profile->user_detail_id;
        $user_detail = UserDetail::where('id',$user_detail_id)->first();
        // end get user detail



        // if user profile 
        if($applicationRecord != null){
            return view('oas.userProfile.viewPersonalParticulars', compact(['applicant_profile','user_detail']));
        }   
    }
}
