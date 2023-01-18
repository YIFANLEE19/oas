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

class StatusOfHealthController extends Controller
{
    //
    public function index()
    {
        $diseases = Disease::all();
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->first();

        if($application_status_log_id == null){
            $application_status_id = 0;
            return view('oas.status_of_health.home', compact(['diseases','application_status_id']));
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            return view('oas.status_of_health.home', compact(['diseases','application_status_id']));
        }
    }

    public function create(){
        $r = request();
        
        $COMPLETESTATUSOFHEALTH = 7;

        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('id');
        if (StatusOfHealth::where('application_record_id', '=', $applicationRecord->id)->exists()) {
            
        $r=request();
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('id');
        StatusOfHealth::where('disease_id',1 )->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[1],
                'disease_status' => $r->h_status[1],
            ]
        );

        StatusOfHealth::where('disease_id',2 )->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[2],
                'disease_status' => $r->h_status[2],
            ]
        );

        StatusOfHealth::where('disease_id',3)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[3],
                'disease_status' => $r->h_status[3],
            ]
        );

        StatusOfHealth::where('disease_id',4)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[4],
                'disease_status' => $r->h_status[4],
            ]
        );

        StatusOfHealth::where('disease_id',5)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[5],
                'disease_status' => $r->h_status[5],
            ]
        );

        StatusOfHealth::where('disease_id',6)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[6],
                'disease_status' => $r->h_status[6],
            ]
        );

        StatusOfHealth::where('disease_id',7)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[7],
                'disease_status' => $r->h_status[7],
            ]
        );

        StatusOfHealth::where('disease_id',8)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[8],
                'disease_status' => $r->h_status[8],
            ]
        );

        StatusOfHealth::where('disease_id',9)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[9],
                'disease_status' => $r->h_status[9],
            ]
        );

        StatusOfHealth::where('disease_id',10)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[10],
                'disease_status' => $r->h_status[10],
            ]
        );

        StatusOfHealth::where('disease_id',11)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[11],
                'disease_status' => $r->h_status[11],
            ]
        );

        StatusOfHealth::where('disease_id',12)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[12],
                'disease_status' => $r->h_status[12],
            ]
        );

        StatusOfHealth::where('disease_id',13)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[13],
                'disease_status' => $r->h_status[13],
            ]
        );

        StatusOfHealth::where('disease_id',14)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[14],
                'disease_status' => $r->h_status[14],
            ]
        );

        StatusOfHealth::where('disease_id',15)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[15],
                'disease_status' => $r->h_status[15],
            ]
        );

        StatusOfHealth::where('disease_id',16)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[16],
                'disease_status' => $r->h_status[16],
            ]
        );

        StatusOfHealth::where('disease_id',17)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[17],
                'disease_status' => $r->h_status[17],
            ]
        ); 
    
        }
        else
        {
        

        StatusOfHealth::create(
            [
                
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[1],
                'disease_remark' => $r->h_remark[1],
                'disease_status' => $r->h_status[1],
            ],
        );

        StatusOfHealth::create(
            [
                
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[2],
                'disease_remark' => $r->h_remark[2],
                'disease_status' => $r->h_status[2],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[3],
                'disease_remark' => $r->h_remark[3],
                'disease_status' => $r->h_status[3],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[4],
                'disease_remark' => $r->h_remark[4],
                'disease_status' => $r->h_status[4],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[5],
                'disease_remark' => $r->h_remark[5],
                'disease_status' => $r->h_status[5],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[6],
                'disease_remark' => $r->h_remark[6],
                'disease_status' => $r->h_status[6],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[7],
                'disease_remark' => $r->h_remark[7],
                'disease_status' => $r->h_status[7],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[8],
                'disease_remark' => $r->h_remark[8],
                'disease_status' => $r->h_status[8],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[9],
                'disease_remark' => $r->h_remark[9],
                'disease_status' => $r->h_status[9],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[10],
                'disease_remark' => $r->h_remark[10],
                'disease_status' => $r->h_status[10],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[11],
                'disease_remark' => $r->h_remark[11],
                'disease_status' => $r->h_status[11],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[12],
                'disease_remark' => $r->h_remark[12],
                'disease_status' => $r->h_status[12],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[13],
                'disease_remark' => $r->h_remark[13],
                'disease_status' => $r->h_status[13],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[14],
                'disease_remark' => $r->h_remark[14],
                'disease_status' => $r->h_status[14],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[15],
                'disease_remark' => $r->h_remark[15],
                'disease_status' => $r->h_status[15],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[16],
                'disease_remark' => $r->h_remark[16],
                'disease_status' => $r->h_status[16],
            ],
        );

        StatusOfHealth::create(
            [
                'application_record_id' => $applicationRecord->id,
                'disease_id' => $r->disease_id[17],
                'disease_remark' => $r->h_remark[17],
                'disease_status' => $r->h_status[17],
            ],
        ); 
    }
        
        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($find_application_status_log != null){
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $COMPLETESTATUSOFHEALTH;
            $application_status_log->save();
        }
        

        Session::flash('application_status_id',$COMPLETESTATUSOFHEALTH);
        return back();
    }


    public function view(){ 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first();
        $application_status_log_id = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($applicationRecord == null || $application_status_log_id == null){
            return redirect()->route('home');
        }else{
            $application_status_id = $application_status_log_id->application_status_id;
            if($application_status_id != 7 && $application_status_id < 7){
                return redirect()->route('home');
            }
        }
        $applicant_application_id = $applicationRecord->id;
        $statusOfHealth = StatusOfHealth::where('application_record_id',$applicant_application_id)->get();
        if($applicationRecord != null){
            return view('oas.status_of_health.view', compact(['statusOfHealth']));
        }   
    }

    public function update(){
        $r=request();
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('id');
        StatusOfHealth::where('disease_id',1 )->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[1],
                'disease_status' => $r->h_status[1],
            ]
        );

        StatusOfHealth::where('disease_id',2 )->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[2],
                'disease_status' => $r->h_status[2],
            ]
        );

        StatusOfHealth::where('disease_id',3)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[3],
                'disease_status' => $r->h_status[3],
            ]
        );

        StatusOfHealth::where('disease_id',4)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[4],
                'disease_status' => $r->h_status[4],
            ]
        );

        StatusOfHealth::where('disease_id',5)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[5],
                'disease_status' => $r->h_status[5],
            ]
        );

        StatusOfHealth::where('disease_id',6)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[6],
                'disease_status' => $r->h_status[6],
            ]
        );

        StatusOfHealth::where('disease_id',7)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[7],
                'disease_status' => $r->h_status[7],
            ]
        );

        StatusOfHealth::where('disease_id',8)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[8],
                'disease_status' => $r->h_status[8],
            ]
        );

        StatusOfHealth::where('disease_id',9)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[9],
                'disease_status' => $r->h_status[9],
            ]
        );

        StatusOfHealth::where('disease_id',10)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[10],
                'disease_status' => $r->h_status[10],
            ]
        );

        StatusOfHealth::where('disease_id',11)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[11],
                'disease_status' => $r->h_status[11],
            ]
        );

        StatusOfHealth::where('disease_id',12)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[12],
                'disease_status' => $r->h_status[12],
            ]
        );

        StatusOfHealth::where('disease_id',13)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[13],
                'disease_status' => $r->h_status[13],
            ]
        );

        StatusOfHealth::where('disease_id',14)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[14],
                'disease_status' => $r->h_status[14],
            ]
        );

        StatusOfHealth::where('disease_id',15)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[15],
                'disease_status' => $r->h_status[15],
            ]
        );

        StatusOfHealth::where('disease_id',16)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[16],
                'disease_status' => $r->h_status[16],
            ]
        );

        StatusOfHealth::where('disease_id',17)->where('application_record_id',$applicationRecord->id)->update(
            [
                'disease_remark' => $r->h_remark[17],
                'disease_status' => $r->h_status[17],
            ]
        ); 
        Session::flash('successSOH',"Your Status Of Health is successfully update");
        return redirect()->route('draft.home');
    }
}
