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
        return view('oas.agreements.home',compact('APPLICATION_RECORD_ID','application_status_log_id'));
    }

    public function submit($id){
        // dd(Crypt::encrypt(session('key')));

        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',session('key'))->first();
        $getApplicationStatusLog->application_status_id = config('constants.APPLICATION_STATUS_CODE.COMPLETE_AGREEMENT');
        $getApplicationStatusLog->save();

        $data = [
            'application_status_id' => config('constants.APPLICATION_STATUS_CODE.COMPLETE_AGREEMENT'),
            'application_record_id' => Crypt::encrypt(session('key')),
        ];

        return back();
    }
}
