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

class AgreementController extends Controller
{
    //
    public function index(){

        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first();
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->first();

        if($applicationRecord == null ){
            return redirect()->route('home');
        }
        
        if($application_status_log_id == null){
            $application_status_id = 0;
            return view('oas.agreements.home',compact('application_status_id'));
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            return view('oas.agreements.home',compact('application_status_id'));
        }
    }

    public function submit(){
        $COMPLETEAGREEMENT = 8;
       
       
        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
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
