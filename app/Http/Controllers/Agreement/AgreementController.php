<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationRecord;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\ApplicationStatusLog;
use Auth;
use Session;
use DB;
use Illuminate\Support\Facades\Crypt;

class AgreementController extends Controller
{
    //
    public function index($id){

        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        session(['key'=>$APPLICATION_RECORD_ID]);
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        
        if($application_status_log_id == null){
            $application_status_id = 0;
            return view('oas.agreements.home',compact('application_status_id','APPLICATION_RECORD_ID'));
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            return view('oas.agreements.home',compact('application_status_id','APPLICATION_RECORD_ID'));
        }
    }

    public function submit($id){
        // dd(session('key'));
        $COMPLETEAGREEMENT = 8;
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        if($find_application_status_log != null){
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $COMPLETEAGREEMENT;
            $application_status_log->save();
        }
        Session::flash('application_status_id',$COMPLETEAGREEMENT);
        return back();
    }
}
