<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationRecord;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\ApplicantProfilePicture;
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
        /**
         * code - 
         * 0    - new user
         * 1    - personal particulars
         * 2    - parent guardian particulars
         * 3    - emergency contact
         * 4    - profile picture
         * 5    - finish
         */
        $status_code;
        $applicant_profile_id;

        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        if($applicationRecord != null){
            $applicant_profile_id = $applicationRecord->applicant_profile_id;
            $status_code = 1;
            $applicant_guardian_list_check = ApplicantGuardianList::where('applicant_profile_id',$applicant_profile_id)->first();
            if($applicant_guardian_list_check == null){
                $status_code = 2;
            }else{
                $emergency_contact_list_check = EmergencyContactList::where('applicant_profile_id',$applicant_profile_id)->first();
                if($emergency_contact_list_check == null){
                    $status_code = 3;
                }else{
                    $profile_picture_check = ApplicantProfilePicture::where('applicant_profile_id',$applicant_profile_id)->first();
                    if($profile_picture_check == null){
                        $status_code = 4;
                    }else{
                        $status_code = 5;
                    }
                }
            }
        }else{
            $status_code = 0;
        }
        

        // dd($applicant_profile_id);
        return view('oas.home', compact('status_code'));
    }
}
