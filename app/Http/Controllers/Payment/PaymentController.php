<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Payment;
use App\Models\ApplicationRecord;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\ApplicationStatusLog;
use Session;

class PaymentController extends Controller
{
    public function index(){
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->first();
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first();
        if($application_status_log_id == null){
            $application_status_id = 0;
            return view('oas.payment.home',compact('application_status_id'));
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            return view('oas.payment.home',compact('application_status_id'));
        }
    }
    //
    public function create(){
        $r=request();  //received the data by GET or POST mothod
        $COMPLETEPAYMENT = 11;
       
        $r->validate([
            'payment' => 'required|file|mimes:jpeg,jpg,png,pdf|max:5120',
        ]);
    
        $payment=$r->file('payment');                       
        $paymentName=date('YmdHi').$payment->getClientOriginalName();
        $payment->move('payment',$paymentName);   //payments is the location 

        // get user applicant profile id 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('id');

        Payment::create([
            'application_record_id' => $applicationRecord->id,
            'payment_slip'=>$paymentName
        ]);

        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($find_application_status_log != null){
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $COMPLETEPAYMENT;
            $application_status_log->save();
        }
 
        Session::flash('application_status_id',$COMPLETEPAYMENT); 
        return back();
    }
}
