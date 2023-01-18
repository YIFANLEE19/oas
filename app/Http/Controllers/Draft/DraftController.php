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
use App\Models\ProgrammeRecord;
use App\Models\Programme;
use App\Models\ProgrammeLevel;
use App\Models\ProgrammePicked;
use App\Models\SemesterYearMapping;
use App\Models\Semester;
use Auth;
use DB;
use Session;

class DraftController extends Controller
{
    //
    private $STATUS_ACTIVE = 1;

    private $CORRESPONDENCE_ADDRESS_TYPE = 1;
    private $PERMANENT_ADDRESS_TYPE = 2;

    public function index(){
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first();
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($applicationRecord == null ){return redirect()->route('home');}
        $applicant_record_id = $applicationRecord->id;
        $applicant_profile_id = $applicationRecord->applicant_profile_id;
        
        $allRelationships = GuardianRelationship::where('status',$this->STATUS_ACTIVE)->get();
        $allNationalities = Nationality::where('status',$this->STATUS_ACTIVE)->get();
        $allIncomes = Income::where('status',$this->STATUS_ACTIVE)->get();
        $allCountries = Country::where('status',$this->STATUS_ACTIVE)->get();
        $allGenders = Gender::where('status',$this->STATUS_ACTIVE)->get();
        $allMaritals = Marital::where('status',$this->STATUS_ACTIVE)->get();
        $allRaces = Race::where('status',$this->STATUS_ACTIVE)->get();
        $allReligions = Religion::where('status',$this->STATUS_ACTIVE)->get();
        
        $data = [
            'races' => $allRaces,
            'religions' => $allReligions,
            'nationalities' => $allNationalities,
            'genders' => $allGenders,
            'maritals' => $allMaritals,
            'countries' => $allCountries,
            'relationships' => $allRelationships,
            'incomes' => $allIncomes,
        ];

        $getApplicantProfile = ApplicantProfile::where('id',$applicant_profile_id)->first();
        $getPersonalUserDetailId = $getApplicantProfile->user_detail_id;
        $getPersonalUserDetail = UserDetail::where('id',$getPersonalUserDetailId)->first();
        
        $academicRecord = AcademicRecord::where('application_record_id',$applicant_record_id)->get();
        $statusOfHealth = StatusOfHealth::where('application_record_id',$applicant_record_id)->get();
        
        $p_c_address_mapping = AddressMapping::where('user_detail_id',$getPersonalUserDetailId)->where('address_type_id',$this->CORRESPONDENCE_ADDRESS_TYPE)->first();
        $p_p_address_mapping = AddressMapping::where('user_detail_id',$getPersonalUserDetailId)->where('address_type_id',$this->PERMANENT_ADDRESS_TYPE)->first();
        $p_c_address_id = $p_c_address_mapping->address_id;
        $p_p_address_id = $p_p_address_mapping->address_id;
        
        $getApplicantGuardianProfile = ApplicantGuardianList::where('applicant_profile_id',$applicant_profile_id)->first();
        $getGuardianDetailId = $getApplicantGuardianProfile->guardian_detail_id;
        $getGuardianDetail = GuardianDetail::where('id',$getGuardianDetailId)->first();
        $guardian_user_detail_id = $getGuardianDetail->user_detail_id;
        $guardian_user_detail = UserDetail::where('id',$guardian_user_detail_id)->first();
        $g_p_address_mapping = AddressMapping::where('user_detail_id',$guardian_user_detail_id)->where('address_type_id',$this->PERMANENT_ADDRESS_TYPE)->first();
        $g_p_address_id = $g_p_address_mapping->address_id;
        $g_p_address = Address::where('id', $g_p_address_id)->first();
        $p_c_address = Address::where('id', $p_c_address_id)->first();
        $p_p_address = Address::where('id', $p_p_address_id)->first();
        
        $emergency_contact_lists = EmergencyContactList::where('applicant_profile_id',$applicant_profile_id)->get();
        $emergency_contact_id1 = $emergency_contact_lists[0]->emergency_contact_id;
        $emergency_contact_id2 = $emergency_contact_lists[1]->emergency_contact_id;
        $emergency_contact1 = EmergencyContact::where('id',$emergency_contact_id1)->first();
        $emergency_contact2 = EmergencyContact::where('id',$emergency_contact_id2)->first();
        $e_user_detail_id1 = $emergency_contact1->user_detail_id;
        $e_user_detail_id2 = $emergency_contact2->user_detail_id;
        $e_user_detail1 = UserDetail::where('id',$e_user_detail_id1)->first();
        $e_user_detail2 = UserDetail::where('id',$e_user_detail_id2)->first();

        $programmePicked1 = ProgrammePicked::where('application_records_id',$applicant_record_id)->where('choice_priorities_id',1)->first();
        $programmeRecordId1 = $programmePicked1->programme_records_id;
        $programmeRecord1 = ProgrammeRecord::where('id',$programmeRecordId1)->first();
        $programmeId1 = $programmeRecord1->programmes_id;
        $programme1 = Programme::where('id',$programmeId1)->first();
        $programmeLevelId = $programme1->programme_levels_id;
        $programmeLevel = ProgrammeLevel::where('id',$programmeLevelId)->first();
        
        $semesterYearMappingId = $programmeRecord1->semester_year_mappings_id;
        $semesterYearMapping = SemesterYearMapping::where('id',$semesterYearMappingId)->first();
        $semesterId = $semesterYearMapping->semesters_id;
        $semester = Semester::where('id',$semesterId)->first();
        
        $programmePicked2 = ProgrammePicked::where('application_records_id',$applicant_record_id)->where('choice_priorities_id',2)->first();
        $programmeRecordId2 = $programmePicked2->programme_records_id;
        $programmeRecord2 = ProgrammeRecord::where('id',$programmeRecordId2)->first();
        $programmeId2 = $programmeRecord2->programmes_id;
        $programme2 = Programme::where('id',$programmeId2)->first();
        $programmePicked3 = ProgrammePicked::where('application_records_id',$applicant_record_id)->where('choice_priorities_id',3)->first();
        $applicant_profile_picture = ApplicantProfilePicture::where('applicant_profile_id',$applicant_profile_id)->first();

        //load program for program selection
        $postgraduate = DB::connection('mysql')->select('SELECT * FROM programmes WHERE programme_levels_id="1" 
        OR programme_levels_id="2" AND status=1 ORDER BY programme_levels_id DESC, EnglishName;');
        $undergraduate = DB::connection('mysql')->select('SELECT * FROM programmes WHERE programme_levels_id!="1" 
        AND programme_levels_id!="2" AND status=1 ORDER BY programme_levels_id DESC, EnglishName');
        $semestersql = DB::connection('mysql')->select('SELECT * FROM semester_year_mappings
        INNER JOIN semesters on semester_year_mappings.semesters_id=semesters.id WHERE status=1;
        ');

        if($application_status_log_id == null){
            $application_status_id = 0;
            return view('oas.draft.home',compact(['programmePicked3','applicant_profile_picture','programmeLevel','semesterYearMapping','semester','programme1','programme2','programmePicked1','programmeRecord1','programmePicked2','programmeRecord2','academicRecord','statusOfHealth','getPersonalUserDetail','getApplicantProfile','p_c_address','p_p_address','getGuardianDetail','guardian_user_detail','g_p_address','e_user_detail1','e_user_detail2','emergency_contact1','emergency_contact2','data','application_status_id', 'postgraduate', 'undergraduate', 'semestersql']));
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            if($programmePicked3!= null){
                $programmeRecordId3 = $programmePicked3->programme_records_id;
                $programmeRecord3 = ProgrammeRecord::where('id',$programmeRecordId3)->first();
                $programmeId3 = $programmeRecord3->programmes_id;
                $programme3 = Programme::where('id',$programmeId3)->first();
                return view('oas.draft.home',compact(['applicant_profile_picture','programmeLevel','semesterYearMapping','semester','programme1','programme2','programme3','programmePicked1','programmeRecord1','programmePicked2','programmeRecord2','programmePicked3','programmeRecord3','academicRecord','statusOfHealth','getPersonalUserDetail','getApplicantProfile','p_c_address','p_p_address','getGuardianDetail','guardian_user_detail','g_p_address','e_user_detail1','e_user_detail2','emergency_contact1','emergency_contact2','data','application_status_id', 'postgraduate', 'undergraduate', 'semestersql']));
            }
            return view('oas.draft.home',compact(['programmePicked3','applicant_profile_picture','programmeLevel','semesterYearMapping','semester','programme1','programme2','programmePicked1','programmeRecord1','programmePicked2','programmeRecord2','academicRecord','statusOfHealth','getPersonalUserDetail','getApplicantProfile','p_c_address','p_p_address','getGuardianDetail','guardian_user_detail','g_p_address','e_user_detail1','e_user_detail2','emergency_contact1','emergency_contact2','data','application_status_id', 'postgraduate', 'undergraduate', 'semestersql']));
        }
    }

    public function submit(){
        $COMPLETEDRAFT = 9;

        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($find_application_status_log != null){
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $COMPLETEDRAFT;
            $application_status_log->save();
        }

    Session::flash('application_status_id',$COMPLETEDRAFT);
    return back();
    }
}
