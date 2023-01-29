<?php

namespace App\Http\Controllers\Draft;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationRecord;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\AcademicRecord;
use App\Models\StatusOfHealth;
use App\Models\ApplicantProfile;
use App\Models\UserDetail;
use App\Models\AddressMapping;
use App\Models\Address;
use App\Models\GuardianDetail;
use App\Models\EmergencyContact;
use App\Models\GuardianRelationship;
use App\Models\Nationality;
use App\Models\Income;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Marital;
use App\Models\Race;
use App\Models\Religion;
use App\Models\ApplicationStatusLog;
use App\Models\ApplicantStatusLog;
use App\Models\ProgrammeRecord;
use App\Models\Programme;
use App\Models\ProgrammeLevel;
use App\Models\ProgrammePicked;
use App\Models\SemesterYearMapping;
use App\Models\Semester;
use Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class DraftController extends Controller
{
    public function index($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        session(['key'=>$APPLICATION_RECORD_ID]);

        //
        $getRelationships = GuardianRelationship::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getReligions = Religion::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getNationalities = Nationality::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getIncomes = Income::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getCountries = Country::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getRaces = Race::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getGenders = Gender::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $getMaritals = Marital::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        //ApplicantStatusLog
        $getApplicantStatusLog = ApplicantStatusLog::where('user_id',Auth::id())->first();
        //programme selection
        $getSelectedCourses = ProgrammePicked::where('application_record_id',$APPLICATION_RECORD_ID)->get();
        // personal particulars
        $applicantProfile = ApplicantProfile::where('id',$getApplicantStatusLog->applicant_profile_id)->first();
        $userDetail = UserDetail::where('id',$applicantProfile->user_detail_id)->first();
        $getCorrespondenceAddressMapping = AddressMapping::where('user_detail_id',$userDetail->id)->where('address_type_id',config('constants.ADDRESS_TYPE.CORRESPONDENCE'))->first();
        $getCorrespondenceAddress = Address::where('id',$getCorrespondenceAddressMapping->address_id)->first();
        $getPermanentAddressMapping = AddressMapping::where('user_detail_id',$userDetail->id)->where('address_type_id',config('constants.ADDRESS_TYPE.PERMANENT'))->first();
        $getPermanentAddress = Address::where('id',$getPermanentAddressMapping->address_id)->first();
        // parent/guardian particulars
        $getApplicantGuardianList = ApplicantGuardianList::where('applicant_profile_id',$getApplicantStatusLog->applicant_profile_id)->first();
        $getGuardianDetail = GuardianDetail::where('id',$getApplicantGuardianList->guardian_detail_id)->first();
        $getGuardianUserDetail = UserDetail::where('id',$getGuardianDetail->user_detail_id)->first();
        $getGuardianPermanentAddressMapping = AddressMapping::where('user_detail_id',$getGuardianDetail->user_detail_id)->where('address_type_id',config('constants.ADDRESS_TYPE.PERMANENT'))->first();
        $getGuardianPermanentAddress = Address::where('id',$getGuardianPermanentAddressMapping->address_id)->first();
        //emergency contact
        $getEmergencyContactLists = EmergencyContactList::where('applicant_profile_id',$getApplicantStatusLog->applicant_profile_id)->get();
        $getEmergencyContact1 = EmergencyContact::where('id',$getEmergencyContactLists[0]->emergency_contact_id)->first();
        $getEmergencyContact2 = EmergencyContact::where('id',$getEmergencyContactLists[1]->emergency_contact_id)->first();
        $getEmergencyContactUserDetail1 = UserDetail::where('id',$getEmergencyContact1->user_detail_id)->first();
        $getEmergencyContactUserDetail2 = UserDetail::where('id',$getEmergencyContact2->user_detail_id)->first();
        //profile picture
        $applicant_profile_picture = ApplicantProfilePicture::where('applicant_profile_id',$getApplicantStatusLog->applicant_profile_id)->first();
        //academic record
        $getAcademicRecord = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('status',1)->get();
        // status of health
        $getStatusOfHealth = StatusOfHealth::where('application_record_id',$APPLICATION_RECORD_ID)->get();

        $data = [
            'getRaces' => $getRaces,
            'getReligions' => $getReligions,
            'getRelationships' => $getRelationships,
            'getNationalities' => $getNationalities,
            'getGenders' => $getGenders,
            'getMaritals' => $getMaritals,
            'getIncomes' => $getIncomes,
            'getCountries' => $getCountries,
            'getSelectedCourses' => $getSelectedCourses,
            'applicant_profile' => $applicantProfile,
            'user_detail' => $userDetail,
            'c_address' => $getCorrespondenceAddress,
            'p_address' => $getPermanentAddress,
            'guardian_detail' => $getGuardianDetail,
            'guardian_user_detail' => $getGuardianUserDetail,
            'pg_p_address' => $getGuardianPermanentAddress,
            'emergency_contact1' => $getEmergencyContact1,
            'emergency_contact2' => $getEmergencyContact2,
            'emergency_contact_user_detail1' => $getEmergencyContactUserDetail1,
            'emergency_contact_user_detail2' => $getEmergencyContactUserDetail2,
            'profile_picture' => $applicant_profile_picture,
            'academic_record' => $getAcademicRecord,
            'status_of_health' => $getStatusOfHealth,
        ];

        return view('oas.draft.home', compact('data','APPLICATION_RECORD_ID'));
    }

}
