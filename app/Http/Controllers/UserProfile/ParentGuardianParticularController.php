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
use App\Models\ApplicationStatusLog;
use Illuminate\Http\Request;
use Auth;
use Session;

class ParentGuardianParticularController extends Controller
{
    /*
    |-----------------------------------------------------------
    | const variable
    |-----------------------------------------------------------
    */
    private $STATUS_ACTIVE = 1;
    private $NEW_USER_CODE = 0;
    private $PERMANENT_ADDRESS_TYPE = 2;
    private $COMPLETEPARENTGUARDIANPARTICULARS = 2;
    
    /*
    |-----------------------------------------------------------
    | undefined variable
    |-----------------------------------------------------------
    */
    private $finalIC;

    /*
    |-----------------------------------------------------------
    | Return step 2 parent/guardian particulars(form)
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
        $getRelationships = GuardianRelationship::where('status',$this->STATUS_ACTIVE)->get();
        $getNationalities = Nationality::where('status',$this->STATUS_ACTIVE)->get();
        $getIncomes = Income::where('status',$this->STATUS_ACTIVE)->get();
        $getCountries = Country::where('status',$this->STATUS_ACTIVE)->get();

        $data = [
            'relationships' => $getRelationships,
            'nationalities' => $getNationalities,
            'incomes' => $getIncomes,
            'countries' => $getCountries,
        ];

        $application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($application_status_log == null){
            $application_status_id = $this->NEW_USER_CODE;
            return view('oas.userProfile.parentGuardianParticulars', compact(['data','application_status_id']));
        }else{
            $application_status_id = $application_status_log->application_status_id;
            return view('oas.userProfile.parentGuardianParticulars', compact(['data','application_status_id']));
        }
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
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');

        if($r->passport == ''){
            $finalIC = $r->ic1.'-'.$r->ic2.'-'.$r->ic3;
        }else{
            $finalIC = $r->passport;
        }

        $user_detail_id = UserDetail::insertGetId([
            'en_name' => $r->en_name,
            'ch_name' => $r->ch_name,
            'ic' => $finalIC,
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
            'address_type_id' => $this->PERMANENT_ADDRESS_TYPE,
        ]);
        $applicant_guardian_list = ApplicantGuardianList::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'guardian_detail_id' => $guardian_detail_id,
        ]);
        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($find_application_status_log != null){
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $this->COMPLETEPARENTGUARDIANPARTICULARS;
            $application_status_log->save();
        }
        Session::flash('application_status_id',$this->COMPLETEPARENTGUARDIANPARTICULARS);
        return back();
    }

    /*
    |-----------------------------------------------------------
    | View function
    |-----------------------------------------------------------
    */
    public function view()
    {

        $getRelationships = GuardianRelationship::where('status',$this->STATUS_ACTIVE)->get();
        $getNationalities = Nationality::where('status',$this->STATUS_ACTIVE)->get();
        $getIncomes = Income::where('status',$this->STATUS_ACTIVE)->get();
        $getCountries = Country::where('status',$this->STATUS_ACTIVE)->get();

        $data = [
            'relationships' => $getRelationships,
            'nationalities' => $getNationalities,
            'incomes' => $getIncomes,
            'countries' => $getCountries,
        ];

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
        $applicant_guardian_list = ApplicantGuardianList::where('applicant_profile_id',$applicant_profile_id)->first();
        $guardian_detail_id = $applicant_guardian_list->guardian_detail_id;
        $guardian_detail = GuardianDetail::where('id',$guardian_detail_id)->first();
        $user_detail_id = $guardian_detail->user_detail_id;
        $user_detail = UserDetail::where('id',$user_detail_id)->first();
        // address
        $p_address_mapping = AddressMapping::where('user_detail_id',$user_detail_id)->where('address_type_id',$this->PERMANENT_ADDRESS_TYPE)->first();
        $p_address_id = $p_address_mapping->address_id;
        $p_address = Address::where('id', $p_address_id)->first();

        return view('oas.userProfile.viewParentGuardianParticulars', compact(['user_detail','guardian_detail','p_address','data']));
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
        $GUARDIAN_DETAIL_ID = $r->guardian_detail_id;
        $P_ADDRESS_ID = $r->p_address_id;
        
        if($r->passport == ''){
            $finalIC = $r->ic1.'-'.$r->ic2.'-'.$r->ic3;
        }else{
            $finalIC = $r->passport;
        }

        $user_detail = UserDetail::find($USER_DETAIL_ID);
        $user_detail->en_name = $r->en_name;
        $user_detail->ch_name = $r->ch_name;
        $user_detail->ic = $finalIC;
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
        
        Session::flash('success','success');
        return back();
    }
}
