<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationRecord;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicationStatusLog;
use App\Models\ApplicantStatusLog;
use App\Models\ProgrammePicked;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        $application_status_logs = ApplicationStatusLog::where('user_id',Auth::id())->get();
        // dd($application_status_logs[0]->application_record_id);
        $testingarray = array();
        foreach($application_status_logs as $item){
            $testingarray[] = $item->application_record_id;
        }
        $getProgrammePickeds = ProgrammePicked::whereIn('application_record_id',$testingarray)->get();
        //$getProgrammePickeds = ProgrammePicked::whereIn('application_record_id');
        return view('oas.home', compact('applicant_status_log','application_status_logs','getProgrammePickeds'));
    }
}
