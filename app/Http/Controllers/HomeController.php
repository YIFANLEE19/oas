<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationRecord;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicationStatusLog;
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
        $application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($application_status_log == null){
            $application_status_id = 0;
            return view('oas.home', compact('application_status_id'));
        }else{
            $application_status_id = $application_status_log->application_status_id;
            return view('oas.home', compact('application_status_id'));
        }
    }
}
