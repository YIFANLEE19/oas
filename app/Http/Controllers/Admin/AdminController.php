<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationStatusLog;
use App\Models\ApplicationRecord;
use App\Models\ApplicantProfile;
use App\Models\UserDetail;
use App\Models\CmsApplicantData;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use DB;

class AdminController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        // get application status log where status is complete payment
        $getAllApplicationStatusLogs = ApplicationStatusLog::where('application_status_id','=',config('constants.APPLICATION_STATUS_CODE.COMPLETE_PAYMENT'))->get();
        $getAllApplicationRecordIds = ApplicationStatusLog::where('application_status_id','=',config('constants.APPLICATION_STATUS_CODE.COMPLETE_PAYMENT'))->get('application_record_id');
        $getAllApplicationRecords = ApplicationRecord::whereIn('id',$getAllApplicationRecordIds)->get();
        $getAllApplicantProfileIds = ApplicationRecord::whereIn('id',$getAllApplicationRecordIds)->get('applicant_profile_id');
        $getAllApplicantProfiles = ApplicantProfile::whereIn('id', $getAllApplicantProfileIds)->get();
        $getAllUserDetailsIds = ApplicantProfile::whereIn('id', $getAllApplicantProfileIds)->get('user_detail_id');
        $getAllUserDetails = UserDetail::whereIn('id', $getAllUserDetailsIds)->get();
        $getPaymentSlip = Payment::whereIn('application_record_id',$getAllApplicationRecordIds)->get();

        $test = DB::connection('mysql2')->table('person')->where('PersonCode',1)->get();

        return view('oas.admin.home', compact(['getAllApplicationStatusLogs','getAllApplicationRecordIds','getAllUserDetails','getPaymentSlip','test']));
    }
}
