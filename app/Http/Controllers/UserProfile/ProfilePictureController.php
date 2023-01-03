<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicationRecord;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\ApplicationStatusLog;
use Auth;
use Illuminate\Http\Request;
use Session;
use Image;

class ProfilePictureController extends Controller
{
    //
    public function index()
    {
        // code - 0 = personal particulars X
        //      - 1 = personal particulars / AND parent guardian particulars X
        //      - 2 = personal particulars / AND parent guardian particulars / AND emergency contact X
        //      - 3 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture X
        //      - 4 = personal particulars / AND parent guardian particulars / AND emergency contact / AND profile picture /
        $status_code;
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($application_status_log == null){
            $application_status_id = 0;
            return view('oas.userProfile.profilePicture',compact('application_status_id'));
        }else{
            $application_status_id = $application_status_log->application_status_id;
            return view('oas.userProfile.profilePicture',compact('application_status_id'));
        }
    }

    /**
     * create function
     */
    public function create(Request $request)
    {
        $COMPLETEPROFILEPICTURE = 4;

        $request->validate([
            'picture' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');

        $picture = $request->file('picture');
        $pictureName = 'profile_picture_'.Auth::user()->name.'_'.date('YmdHii').$picture->getClientOriginalName();
        $pictureResize = Image::make($picture->getRealPath());
        $pictureResize->resize(210,280);
        $pictureResize->save(public_path('images/profile_picture/'.$pictureName));
        ApplicantProfilePicture::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'path' => $pictureName
        ]);
        $find_application_status_log = ApplicationStatusLog::where('user_id',Auth::id())->first();
        if($find_application_status_log != null){
            $application_status_log_id = $find_application_status_log->id;
            $application_status_log = ApplicationStatusLog::find($application_status_log_id);
            $application_status_log->application_status_id = $COMPLETEPROFILEPICTURE;
            $application_status_log->save();
        }
        Session::flash('application_status_id',4);
        return back();
    }
    /**
     * view function
     */
    public function view()
    {
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');
        $applicant_profile_id = $applicationRecord->applicant_profile_id;
        $applicant_profile_picture = ApplicantProfilePicture::where('applicant_profile_id',$applicant_profile_id)->first();
        return view('oas.userProfile.viewProfilePicture', compact('applicant_profile_picture'));
    }

    /**
     * update function 
     */
    public function update(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ]);
        $APPLICANT_PROFILE_PICTURE_ID = $request->applicant_profile_picture_id;
        $APPLICANT_PROFILE_ID = $request->applicant_profile_id;
        $picture = $request->file('picture');
        $pictureName = 'profile_picture_'.Auth::user()->name.'_'.date('YmdHii').$picture->getClientOriginalName();
        $pictureResize = Image::make($picture->getRealPath());
        $pictureResize->resize(210,280);
        $pictureResize->save(public_path('images/profile_picture/'.$pictureName));
        $applicant_profile_picture = ApplicantProfilePicture::find($APPLICANT_PROFILE_PICTURE_ID);
        $applicant_profile_picture->path = $pictureName;
        $applicant_profile_picture->applicant_profile_id = $APPLICANT_PROFILE_ID;
        $applicant_profile_picture->save();
        return back();
    }
}
