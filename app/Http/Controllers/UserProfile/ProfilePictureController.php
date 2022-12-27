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
            'picture' => 'required|image|mimes:jpeg,jpg|max:5120',
        ]);

        // get user applicant profile id 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');

        $picture = $request->file('picture');
        $pictureName = date('YmdHii').$picture->getClientOriginalName();
        $picture->move('picture',$pictureName); 
        
        ApplicantProfilePicture::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'path' => $pictureName
        ]);
        Session::flash('status_code',4);
        return back();
    }
}
