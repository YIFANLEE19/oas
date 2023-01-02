<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicationRecord;
use App\Models\ApplicantGuardianList;
use App\Models\EmergencyContactList;
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
        if($applicationRecord == null){
            $status_code = 0;
            return view('oas.userProfile.profilePicture',compact('status_code'));
        }else{
            $applicant_profile_id = $applicationRecord->applicant_profile_id;
            $applicant_guardian_list_check = ApplicantGuardianList::where('applicant_profile_id',$applicant_profile_id)->first();
            if($applicant_guardian_list_check == null){
                $status_code = 1;
                return view('oas.userProfile.profilePicture',compact('status_code'));
            }else{
                $emergency_contact_list_check = EmergencyContactList::where('applicant_profile_id',$applicant_profile_id)->first();
                if($emergency_contact_list_check == null){
                    $status_code = 2;
                    return view('oas.userProfile.profilePicture',compact('status_code'));
                }else{
                    $profile_picture_check = ApplicantProfilePicture::where('applicant_profile_id',$applicant_profile_id)->first();
                    if($profile_picture_check == null){
                        $status_code = 3;
                        return view('oas.userProfile.profilePicture',compact('status_code'));
                    }else{
                        $status_code = 4;
                        return view('oas.userProfile.profilePicture',compact('status_code'));
                    }
                }
            }
        }
    }

    /**
     * create function
     */
    public function create(Request $request)
    {
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
        Session::flash('status_code',4);
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
