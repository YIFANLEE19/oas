<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfilePicture;
use App\Models\ApplicationRecord;
use Auth;
use Illuminate\Http\Request;
use Session;

class ProfilePictureController extends Controller
{
    //
    public function index()
    {
        return view('oas.userProfile.profilePicture');
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
        
        if($applicationRecord != null){
            ApplicantProfilePicture::create([
                'applicant_profile_id' => $applicationRecord->applicant_profile_id,
                'path' => $pictureName
            ]);
        }else{
            Session::flash('success_code',0);
            return back();
        }

        Session::flash('success_code',1);
        return back();
    }
}
