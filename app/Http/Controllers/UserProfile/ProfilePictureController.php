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
use Illuminate\Support\Facades\Storage;
use App\Models\TemporaryFile;
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
    public function removeSession()
    {
        Session::forget(['pictureFileName','pictureFolder']);
    }
    public function index()
    {
        
        $this->removeSession();
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


        $applicant_status_log = ApplicantStatusLog::where('user_id',Auth::id())->first();
        /*
        $picture = $request->file('picture');
        $pictureName = 'profile_picture_'.Auth::user()->name.'_'.date('YmdHii').$picture->getClientOriginalName();
        $pictureResize = Image::make($picture->getRealPath());
        $pictureResize->resize(config('constants.PROFILE_PICTURE.WIDTH'),config('constants.PROFILE_PICTURE.HEIGHT'))->encode();
        Storage::put('public/images/profile_picture/'.$pictureName , $pictureResize);
        ApplicantProfilePicture::create([
            'applicant_profile_id' => $applicant_status_log->applicant_profile_id,
            'path' => Crypt::encrypt($pictureName),
        ]);
        $applicant_status_log->applicant_profile_status_id = config('constants.APPLICANT_PROFILE_STATUS_CODE.COMPLETE_PROFILE_PICTURE');
        $applicant_status_log->save();
        return back();
        */
        $getPictureFolder = Session::get('pictureFolder');
        $getPictureFileName = Session::get('pictureFileName');
        for($i=0; $i < count($getPictureFolder); $i++) {
            $temporary = TemporaryFile::where('folder',$getPictureFolder[$i])->where('file',$getPictureFileName[$i])->first();
            if($temporary){
                $createPicture = ApplicantProfilePicture::create([
                    'applicant_profile_id' => $applicant_status_log->applicant_profile_id,
                    'path' => Crypt::encrypt($getPictureFolder[$i].'/'. $getPictureFileName[$i]),
                ]);
                Storage::move('/public/images/profile_picture/tmp/'.$getPictureFolder[$i].'/'.$getPictureFileName[$i], '/public/images/profile_picture/'.$getPictureFolder[$i].'/'.$getPictureFileName[$i]);
                Storage::deleteDirectory('/public/images/profile_picture/tmp/'. $getPictureFolder[$i]);
                $temporary->delete();
            }
        }
        $this->removeSession();
        
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
        $pictureResize->resize(config('constants.PROFILE_PICTURE.WIDTH'),config('constants.PROFILE_PICTURE.HEIGHT'))->encode();
        Storage::put('public/images/profile_picture/'.$pictureName , $pictureResize);
        // $pictureResize->save(public_path('images/profile_picture/'.$pictureName));
        $applicant_profile_picture = ApplicantProfilePicture::find($APPLICANT_PROFILE_PICTURE_ID);
        $test = Crypt::decrypt($applicant_profile_picture->path);
        Storage::delete('public/images/profile_picture/'.$test);
        $applicant_profile_picture->path = Crypt::encrypt($pictureName);
        $applicant_profile_picture->applicant_profile_id = $APPLICANT_PROFILE_ID;
        $applicant_profile_picture->save();
        Session::flash('success','success');
        return back();
    }
    public function TmpUpload(Request $request){
        $folderName = '';
        if($request->hasFile('picture')){
            $picture = $request->file('picture');
            $pictureFileName = 'picture_'.Auth::user()->name.'_'.date('YmdHii').'_'.$picture->getClientOriginalName();
            $pictureFolder = uniqid('picture', true);
            Session::push('pictureFileName', $pictureFileName);
            Session::push('pictureFolder', $pictureFolder);
            $picture->storeAs('/public/images/profile_picture/tmp/' . $pictureFolder, $pictureFileName);
            TemporaryFile::create([
                'folder' => $pictureFolder,
                'file' => $pictureFileName,
            ]);
            $folderName = $pictureFolder;
        }
        return $folderName;
    }
    public function TmpDelete(Request $request){
        $pictureTmpFile = TemporaryFile::where('folder', $request->file)->first();
        $result = 'not found';
        if($pictureTmpFile){
            $pictureFolderArr = array();
            $pictureFileNameArr = array();
            if(Session::has('pictureFolder')){
                for($i=0; $i < count(Session::get('pictureFolder')); $i++){
                    if(Session::get('pictureFolder')[$i] != $pictureTmpFile->folder){
                        array_push($pictureFolderArr, Session::get('pictureFolder')[$i]);
                    }
                }
                for($i=0; $i < count(Session::get('pictureFileName')); $i++){
                    if(Session::get('pictureFileName')[$i] != $pictureTmpFile->file){
                        array_push($pictureFileNameArr, Session::get('pictureFileName')[$i]);
                    }
                }
                $this->removeSession();
                for($i=0; $i< sizeof($pictureFolderArr); $i++){
                    Session::push('pictureFolder', $pictureFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($pictureFileNameArr); $i++){
                    Session::push('pictureFileName', $pictureFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/profile_picture/tmp/'. $pictureTmpFile->folder);
                $pictureTmpFile->delete();
                $result = 'success';
            }
        }
        return $result;
    }
}
