<?php

namespace App\Http\Controllers\StatusOfHealth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disease;
use App\Models\StatusOfHealth;
use App\Models\ApplicationRecord;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\AcademicRecord;
use App\Models\ApplicationStatusLog;
use Session;
use DB;
use Auth;
use Illuminate\Support\Facades\Crypt;

class StatusOfHealthController extends Controller
{
    //
    public function index($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $diseases = Disease::where('status',config('constants.COL_ACTIVE.ACTIVE'))->get();
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        return view('oas.status_of_health.home', compact(['diseases','APPLICATION_RECORD_ID','application_status_log_id']));

    }

    public function create($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $r = request();

        $getAllDiseaseId = $r->disease_id;
        $getAllDiseaseStatus = $r->disease_status;
        $getAllDiseaseRemark = $r->disease_remark;

        for ($i=0; $i < count($getAllDiseaseId); $i++) { 
            StatusOfHealth::create([
                'application_record_id' => $APPLICATION_RECORD_ID,
                'disease_id' => $getAllDiseaseId[$i],
                'disease_remark' => $getAllDiseaseRemark[$i],
                'disease_status' => $getAllDiseaseStatus[$i],
            ]);
        }

        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        $getApplicationStatusLog->application_status_id = config('constants.APPLICATION_STATUS_CODE.COMPLETE_STATUS_OF_HEALTH');
        $getApplicationStatusLog->save();
        
        return redirect()->route('agreements.home',['id'=> Crypt::encrypt($APPLICATION_RECORD_ID)]);
    }

    public function update($id){

        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $r = request();
        
        $getSelectedStatusOfHealth = StatusOfHealth::where('application_record_id',$APPLICATION_RECORD_ID)->get();

        $getAllDiseaseId = $r->disease_id;
        $getAllDiseaseStatus = $r->disease_status;
        $getAllDiseaseRemark = $r->disease_remark;

        for ($i=0; $i < count($getAllDiseaseId); $i++) { 
            $getSelectedStatusOfHealth[$i]->disease_remark = $getAllDiseaseRemark[$i];
            $getSelectedStatusOfHealth[$i]->disease_status = $getAllDiseaseStatus[$i];
            $getSelectedStatusOfHealth[$i]->save();
        }

        return back();
    }
}
