<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Disease;
use App\Models\SchoolLevel;
use DateTime;
use Auth;
use Illuminate\Support\Facades\Crypt;

class FormController extends Controller
{
    // cal age
    public function calAge($year){
        $dob = new DateTime($year);
        $now = new DateTime();
        $diff = $now->diff($dob);
        return $diff->y;
    }
    //
    public function index($id){
        $APPLICATIONRECORDID = Crypt::decrypt($id);
        // get programme picked
        $getSelectedCourses = ProgrammePicked::where('application_record_id',$APPLICATIONRECORDID)->get();
        // get applicant profile id
        $getApplicantProfileId = ApplicationRecord::where('id',$APPLICATIONRECORDID)->first();
        $applicantProfile = ApplicantProfile::where('id',$getApplicantProfileId->applicant_profile_id)->first();
        $userDetail = UserDetail::where('id',$applicantProfile->user_detail_id)->first();
        $getCorrespondenceAddressMapping = AddressMapping::where('user_detail_id',$userDetail->id)->where('address_type_id',config('constants.ADDRESS_TYPE.CORRESPONDENCE'))->first();
        $getCorrespondenceAddress = Address::where('id',$getCorrespondenceAddressMapping->address_id)->first();
        $age = $this->calAge($applicantProfile->birth_date);
        $getCorrespondenceAddressMapping = AddressMapping::where('user_detail_id',$userDetail->id)->where('address_type_id',config('constants.ADDRESS_TYPE.CORRESPONDENCE'))->first();
        $getCorrespondenceAddress = Address::where('id',$getCorrespondenceAddressMapping->address_id)->first();
        // parent guardian particulars
        $getApplicantGuardianList = ApplicantGuardianList::where('applicant_profile_id',$getApplicantProfileId->applicant_profile_id)->first();
        $getGuardianDetail = GuardianDetail::where('id',$getApplicantGuardianList->guardian_detail_id)->first();
        $getGuardianUserDetail = UserDetail::where('id',$getGuardianDetail->user_detail_id)->first();
        $getGuardianPermanentAddressMapping = AddressMapping::where('user_detail_id',$getGuardianDetail->user_detail_id)->where('address_type_id',config('constants.ADDRESS_TYPE.PERMANENT'))->first();
        $getGuardianPermanentAddress = Address::where('id',$getGuardianPermanentAddressMapping->address_id)->first();
        // emergency contact
        $getEmergencyContactLists = EmergencyContactList::where('applicant_profile_id',$getApplicantProfileId->applicant_profile_id)->get();
        $getEmergencyContact1 = EmergencyContact::where('id',$getEmergencyContactLists[0]->emergency_contact_id)->first();
        $getEmergencyContact2 = EmergencyContact::where('id',$getEmergencyContactLists[1]->emergency_contact_id)->first();
        $getEmergencyContactUserDetail1 = UserDetail::where('id',$getEmergencyContact1->user_detail_id)->first();
        $getEmergencyContactUserDetail2 = UserDetail::where('id',$getEmergencyContact2->user_detail_id)->first();
        //profile picture
        $applicantProfilePicture = ApplicantProfilePicture::where('applicant_profile_id',$getApplicantProfileId->applicant_profile_id)->first();
        //academic record
        $getAcademicRecord = AcademicRecord::where('application_record_id',$APPLICATIONRECORDID)->get();
        // status of health
        $getStatusOfHealth = StatusOfHealth::where('application_record_id',$APPLICATIONRECORDID)->get();
        $getDateSubmission = new DateTime($getApplicantProfileId->created_at);
        $formattedDate = $getDateSubmission->format('d-m-Y');
        $data = [
            'getSelectedCourses' => $getSelectedCourses,
            'applicantProfile' => $applicantProfile,
            'userDetail' => $userDetail,
            'age' => $age,
            'cAddress' => $getCorrespondenceAddress,
            'guardianDetail' => $getGuardianDetail,
            'guardianUserDetail' => $getGuardianUserDetail,
            'pgPAddress' => $getGuardianPermanentAddress,
            'emergencyContact1' => $getEmergencyContact1,
            'emergencyContact2' => $getEmergencyContact2,
            'emergencyContactUserDetail1' => $getEmergencyContactUserDetail1,
            'emergencyContactUserDetail2' => $getEmergencyContactUserDetail2,
            'academicRecord' => $getAcademicRecord,
            'statusOfHealth' => $getStatusOfHealth,
            'profilePicture' => $applicantProfilePicture,
            'formattedDate' => $formattedDate,
        ];
        return view('oas.admin.applicationForm.home' ,compact(['data']));
    }
}
