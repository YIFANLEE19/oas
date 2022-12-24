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
    public function create()
    {
        $r = request();

        // get user applicant profile id 
        $applicationRecord = ApplicationRecord::where('user_id',Auth::id())->first('applicant_profile_id');

        $picture = $r->file('picture');
        $pictureName = date('YmdHii').$picture->getClientOriginalName();
        $picture->move('picture',$pictureName); 

        ApplicantProfilePicture::create([
            'applicant_profile_id' => $applicationRecord->applicant_profile_id,
            'path' => $pictureName
        ]);

        Session::flash('success_code',1);
        return back();
    }
}
