<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicationRecord;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
use App\Models\ApplicantStatusLog;
use Auth;
use Illuminate\Http\Request;
use Session;
use Image;
use Illuminate\Support\Facades\Crypt;

class ProfilePictureController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return step 1 profile picture(form)
    | application_status_id = 0, means it is personal particulars
    | not yet finish to fill in.
    |
    | if application_status_log equal null then   
    |   return application_status_id = 0, means new user
    | else 
    |   return application_status_id
    |-----------------------------------------------------------
    */
    public function index()
    {
        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        if($applicant_status_log != null && $applicant_status_log->applicant_profile_status_id == config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')){
            return redirect()->route('home');
        }
        return view('oas.userProfile.profilePicture',compact('applicant_status_log'));
    }

    /*
    |-----------------------------------------------------------
    | Create function
    | Format: only Accepted ('jpeg','jpg','png')
    | Size: maximum 5MB
    |-----------------------------------------------------------
    */
    public function create(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,jpg,png|max:'.config('constants.PROFILE_PICTURE.MAXSIZE_KB'),
        ]);

        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();

        $picture = $request->file('picture');
        $pictureName = 'profile_picture_'.Auth::user()->name.'_'.date('YmdHii').$picture->getClientOriginalName();
        $pictureResize = Image::make($picture->getRealPath());
        $pictureResize->resize(config('constants.PROFILE_PICTURE.WIDTH'),config('constants.PROFILE_PICTURE.HEIGHT'));
        $pictureResize->save(public_path('images/profile_picture/'.$pictureName));

        ApplicantProfilePicture::create([
            'applicant_profile_id' => $applicant_status_log->applicant_profile_id,
            'path' => Crypt::encrypt($pictureName),
        ]);
        $applicant_status_log->applicant_profile_status_id = config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE');
        $applicant_status_log->save();
        return back();
    }

    /*
    |-----------------------------------------------------------
    | View function
    |-----------------------------------------------------------
    */
    public function view()
    {
        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        if($applicant_status_log == null){
            return redirect()->route('home');
        }else{
            if($applicant_status_log->applicant_profile_status_id != config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE')){
                return redirect()->route('home');
            }
        }
        $applicant_profile_picture = ApplicantProfilePicture::where('applicant_profile_id',$applicant_status_log->applicant_profile_id)->first();
        return view('oas.userProfile.viewProfilePicture', compact('applicant_profile_picture'));
    }

    /*
    |-----------------------------------------------------------
    | Update function
    |-----------------------------------------------------------
    */
    public function update(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,jpg,png|max:'.config('constants.PROFILE_PICTURE.MAXSIZE_KB'),
        ]);
        $APPLICANT_PROFILE_PICTURE_ID = $request->applicant_profile_picture_id;
        $APPLICANT_PROFILE_ID = $request->applicant_profile_id;
        $picture = $request->file('picture');
        $pictureName = 'profile_picture_'.Auth::user()->name.'_'.date('YmdHii').$picture->getClientOriginalName();
        $pictureResize = Image::make($picture->getRealPath());
        $pictureResize->resize(config('constants.PROFILE_PICTURE.WIDTH'),config('constants.PROFILE_PICTURE.HEIGHT'));
        $pictureResize->save(public_path('images/profile_picture/'.$pictureName));
        $applicant_profile_picture = ApplicantProfilePicture::find($APPLICANT_PROFILE_PICTURE_ID);
        $applicant_profile_picture->path = $pictureName;
        $applicant_profile_picture->applicant_profile_id = $APPLICANT_PROFILE_ID;
        $applicant_profile_picture->save();
        Session::flash('success','success');
        return back();
    }
}
