<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\TemporaryFile;
use App\Models\Payment;
use App\Models\ApplicationStatusLog;
use DB;
use Auth;
use Session;

class PaymentController extends Controller
{
    public function removeSession()
    {
        Session::forget(['paymentSlipFileName','paymentSlipFolder']);
    }
    public function index($id)
    {
        $this->removeSession();
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        return view('oas.payment.home', compact(['APPLICATION_RECORD_ID','application_status_log_id']));
    }
    //
    public function create($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $getPaymentSlipFolder = Session::get('paymentSlipFolder');
        $getPaymentSlipFileName = Session::get('paymentSlipFileName');
        for($i=0; $i < count($getPaymentSlipFolder); $i++) {
            $temporary = TemporaryFile::where('folder',$getPaymentSlipFolder[$i])->where('file',$getPaymentSlipFileName[$i])->first();
            if($temporary){
                $createPaymentSlip = Payment::create([
                    'application_record_id' => $APPLICATION_RECORD_ID,
                    'payment_slip' => $getPaymentSlipFolder[$i].'/'. $getPaymentSlipFileName[$i],
                ]);
                Storage::move('/public/images/paymentSlip/tmp/'.$getPaymentSlipFolder[$i].'/'.$getPaymentSlipFileName[$i], '/public/images/paymentSlip/'.$getPaymentSlipFolder[$i].'/'.$getPaymentSlipFileName[$i]);
                Storage::deleteDirectory('/public/images/paymentSlip/tmp/'. $getPaymentSlipFolder[$i]);
                $temporary->delete();
            }
        }
        $this->removeSession();
        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        $getApplicationStatusLog->application_status_id = config('constants.APPLICATION_STATUS_CODE.COMPLETE_PAYMENT');
        $getApplicationStatusLog->save();
        return redirect()->route('home');
    }

    public function tmpUpload(Request $request)
    {
        $folderName = '';
        if($request->hasFile('paymentSlip')){
            $paymentSlip = $request->file('paymentSlip');
            $paymentSlipFileName = 'paymentSlip_'.Auth::user()->name.'_'.date('YmdHii').'_'.$paymentSlip->getClientOriginalName();
            $paymentSlipFolder = uniqid('paymentSlip', true);
            Session::push('paymentSlipFileName', $paymentSlipFileName);
            Session::push('paymentSlipFolder', $paymentSlipFolder);
            $paymentSlip->storeAs('/public/images/paymentSlip/tmp/' . $paymentSlipFolder, $paymentSlipFileName);
            TemporaryFile::create([
                'folder' => $paymentSlipFolder,
                'file' => $paymentSlipFileName,
            ]);
            $folderName = $paymentSlipFolder;
        }
        return $folderName;
    }

    public function tmpDelete(Request $request)
    {
        $paymentSlipTmpFile = TemporaryFile::where('folder', $request->file)->first();
        $result = 'not found';

        if($paymentSlipTmpFile){
            $paymentSlipFolderArr = array();
            $paymentSlipFileNameArr = array();
            if(Session::has('paymentSlipFolder')){
                for($i=0; $i < count(Session::get('paymentSlipFolder')); $i++){
                    if(Session::get('paymentSlipFolder')[$i] != $paymentSlipTmpFile->folder){
                        array_push($paymentSlipFolderArr, Session::get('paymentSlipFolder')[$i]);
                    }
                }
                for($i=0; $i < count(Session::get('paymentSlipFileName')); $i++){
                    if(Session::get('paymentSlipFileName')[$i] != $paymentSlipTmpFile->file){
                        array_push($paymentSlipFileNameArr, Session::get('paymentSlipFileName')[$i]);
                    }
                }
                $this->removeSession();
                for($i=0; $i< sizeof($paymentSlipFolderArr); $i++){
                    Session::push('paymentSlipFolder', $paymentSlipFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($paymentSlipFileNameArr); $i++){
                    Session::push('paymentSlipFileName', $paymentSlipFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/paymentSlip/tmp/'. $paymentSlipTmpFile->folder);
                $paymentSlipTmpFile->delete();
                $result = 'success';
            }
        }
        return $result;
    }
}
