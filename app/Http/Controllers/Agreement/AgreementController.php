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
        $application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        if($application_status_log->application_status_id == config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH')){
            return view('oas.agreements.home',compact('APPLICATION_RECORD_ID'));
        }
        return redirect()->route('home');
    }

    public function submit($id){

        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        if($getApplicationStatusLog->application_status_id != config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH')){
            return redirect()->route('home');
        }
        $getApplicationStatusLog->application_status_id = config('constants.APPLICATION_STATUS_CODE.COMPLETE_AGREEMENT');
        $getApplicationStatusLog->save();

        return redirect()->route('draft.home',['id'=> Crypt::encrypt($APPLICATION_RECORD_ID)]);
    }
}
