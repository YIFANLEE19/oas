<?php

namespace App\Http\Controllers\SupportingDocument;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\TemporaryFile;
use App\Models\ApplicantProfile;
use App\Models\ApplicantStatusLog;
use App\Models\IdentityDocument;
use App\Models\IdentityDocumentPage;
use Auth;
use Session;

class SupportingDocumentController extends Controller
{
    //
    public function index($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        if(Session::has('icFrontFolder') || Session::has('icBackFolder') || Session::has('schoolLeavingCertsFolder')){
            Session::forget('icFrontFolder');
            Session::forget('icBackFolder');
            Session::forget('schoolLeavingCertsFolder');
        }
        return view('oas.supporting_document.home', compact(['APPLICATION_RECORD_ID']));
    }

    public function create(Request $request,$id)
    {
        dd(Session::get('schoolLeavingCertsFolder'));
        dd(sizeof(session('schoolLeavingCertsFolder')));
        dd(Session::get('schoolLeavingCertsFolder')[0]);
        return back();
    }

    public function tmpUpload(Request $request)
    {
        $folderName = '';
        if($request->hasFile('icFront')){
            $icFront = $request->file('icFront');
            $icFrontFileName = 'icFront_'.Auth::user()->name.'_'.date('YmdHii').'_'.$icFront->getClientOriginalName();
            $icFrontFolder = uniqid('icFront',true);
            Session::push('icFrontFolder',$icFrontFolder);
            Session::push('icFrontFileName',$icFrontFileName);
            $icFront->storeAs('/public/images/icFront/tmp/' . $icFrontFolder, $icFrontFileName);
            TemporaryFile::create([
                'folder' => $icFrontFolder,
                'file' => $icFrontFileName,
            ]);
            $folderName = $icFrontFolder;
        }
        if($request->hasFile('icBack')){
            $icBack = $request->file('icBack');
            $icBackFileName = 'icBack_'.Auth::user()->name.'_'.date('YmdHii').'_'.$icBack->getClientOriginalName();
            $icBackFolder = uniqid('icBack',true);
            Session::push('icBackFolder',$icBackFolder);
            Session::push('icBackFileName',$icBackFileName);
            $icBack->storeAs('/public/images/icBack/tmp/' . $icBackFolder, $icBackFileName);
            TemporaryFile::create([
                'folder' => $icBackFolder,
                'file' => $icBackFileName,
            ]);
            $folderName = $icBackFolder;
        } 
        if($request->hasFile('schoolLeavingCerts')){
            $schoolLeavingCerts = $request->file('schoolLeavingCerts');
            $schoolLeavingCertsFileName = 'schoolLeavingCerts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$schoolLeavingCerts->getClientOriginalName();
            $schoolLeavingCertsFolder = uniqid('schoolLeavingCerts',true);
            Session::push('schoolLeavingCertsFolder',$schoolLeavingCertsFolder);
            Session::push('schoolLeavingCertsFileName',$schoolLeavingCertsFileName);
            $schoolLeavingCerts->storeAs('/public/images/schoolLeavingCerts/tmp/' . $schoolLeavingCertsFolder, $schoolLeavingCertsFileName);
            TemporaryFile::create([
                'folder' => $schoolLeavingCertsFolder,
                'file' => $schoolLeavingCertsFileName,
            ]);
            $folderName = $schoolLeavingCertsFolder;
        } 
        if($request->hasFile('secondarySchoolTranscripts')){
            $secondarySchoolTranscripts = $request->file('secondarySchoolTranscripts');
            $secondarySchoolTranscriptsFileName = 'secondarySchoolTranscripts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$secondarySchoolTranscripts->getClientOriginalName();
            $secondarySchoolTranscriptsFolder = uniqid('secondarySchoolTranscripts',true);
            Session::push('secondarySchoolTranscriptsFolder',$secondarySchoolTranscriptsFolder);
            Session::push('secondarySchoolTranscriptsFileName',$secondarySchoolTranscriptsFileName);
            $secondarySchoolTranscripts->storeAs('/public/images/secondarySchoolTranscripts/tmp/' . $secondarySchoolTranscriptsFolder, $secondarySchoolTranscriptsFileName);
            TemporaryFile::create([
                'folder' => $secondarySchoolTranscriptsFolder,
                'file' => $secondarySchoolTranscriptsFileName,
            ]);
            $folderName = $secondarySchoolTranscriptsFolder;
        } 
        if($request->hasFile('foundationTranscripts')){
            $foundationTranscripts = $request->file('foundationTranscripts');
            $foundationTranscriptsFileName = 'foundationTranscripts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$secondarySchoolTranscripts->getClientOriginalName();
            $foundationTranscriptsFolder = uniqid('foundationTranscripts',true);
            Session::push('foundationTranscriptsFolder',$foundationTranscriptsFolder);
            Session::push('foundationTranscriptsFileName',$foundationTranscriptsFileName);
            $foundationTranscripts->storeAs('/public/images/foundationTranscripts/tmp/' . $secondarySchoolTranscriptsFolder, $secondarySchoolTranscriptsFileName);
            TemporaryFile::create([
                'folder' => $foundationTranscriptsFolder,
                'file' => $foundationTranscriptsFileName,
            ]);
            $folderName = $foundationTranscriptsFolder;
        } 
        if($request->hasFile('diplomaTranscripts')){
            $diplomaTranscripts = $request->file('diplomaTranscripts');
            $diplomaTranscriptsFileName = 'diplomaTranscripts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$diplomaTranscripts->getClientOriginalName();
            $diplomaTranscriptsFolder = uniqid('diplomaTranscripts',true);
            Session::push('diplomaTranscriptsFolder',$diplomaTranscriptsFolder);
            Session::push('diplomaTranscriptsFileName',$diplomaTranscriptsFileName);
            $diplomaTranscripts->storeAs('/public/images/diplomaTranscripts/tmp/' . $diplomaTranscriptsFolder, $diplomaTranscriptsFileName);
            TemporaryFile::create([
                'folder' => $diplomaTranscriptsFolder,
                'file' => $diplomaTranscriptsFileName,
            ]);
            $folderName = $diplomaTranscriptsFolder;
        } 
        if($request->hasFile('degreeTranscripts')){
            $degreeTranscripts = $request->file('degreeTranscripts');
            $degreeTranscriptsFileName = 'degreeTranscripts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$degreeTranscripts->getClientOriginalName();
            $degreeTranscriptsFolder = uniqid('degreeTranscripts',true);
            Session::push('degreeTranscriptsFolder',$degreeTranscriptsFolder);
            Session::push('degreeTranscriptsFileName',$degreeTranscriptsFileName);
            $degreeTranscripts->storeAs('/public/images/degreeTranscripts/tmp/' . $degreeTranscriptsFolder, $degreeTranscriptsFileName);
            TemporaryFile::create([
                'folder' => $degreeTranscriptsFolder,
                'file' => $degreeTranscriptsFileName,
            ]);
            $folderName = $degreeTranscriptsFolder;
        } 
        if($request->hasFile('others')){
            $others = $request->file('others');
            $othersFileName = 'others_'.Auth::user()->name.'_'.date('YmdHii').'_'.$others->getClientOriginalName();
            $othersFolder = uniqid('others',true);
            Session::push('othersFolder',$othersFolder);
            Session::push('othersFileName',$othersFileName);
            $others->storeAs('/public/images/others/tmp/' . $othersFolder, $othersFileName);
            TemporaryFile::create([
                'folder' => $othersFolder,
                'file' => $othersFileName,
            ]);
            $folderName = $othersFolder;
        } 
        return $folderName;
    }

    public function tmpDelete(Request $request)
    {

        $icFrontTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $icBackTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $schoolLeavingCertsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $secondarySchoolTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $foundationTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $diplomaTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $degreeTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $othersTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $result = 'not found';

        if($icFrontTmpFile){
            Storage::deleteDirectory('/public/images/icFront/tmp/'. $icFrontTmpFile->folder);
            $icFrontTmpFile->delete();
            Session::forget('icFrontFolder');
            Session::forget('icFrontFileName');
            $result = 'success';
        }
        if($icBackTmpFile){
            Storage::deleteDirectory('/public/images/icBack/tmp/'. $icBackTmpFile->folder);
            $icBackTmpFile->delete();
            Session::forget('icBackFolder');
            Session::forget('icBackFileName');
            $result = 'success';
        }
        if($schoolLeavingCertsTmpFile){
            Storage::deleteDirectory('/public/images/schoolLeavingCerts/tmp/'. $schoolLeavingCertsTmpFile->folder);
            $newArray = array();
            for ($i=0; $i < sizeof(session('schoolLeavingCertsFolder')) ; $i++) { 
                if(Session::get('schoolLeavingCertsFolder')[$i] != $schoolLeavingCertsTmpFile->folder){
                    $newArray[$i] = Session::get('schoolLeavingCertsFolder')[$i];
                }
            }
            Session::forget('schoolLeavingCertsFolder');
            Session::push('schoolLeavingCertsFolder',$newArray);
            $schoolLeavingCertsTmpFile->delete();
            $result = 'success';
        }
        if($secondarySchoolTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/secondarySchoolTranscripts/tmp/'. $secondarySchoolTranscriptsTmpFile->folder);
            $secondarySchoolTranscriptsTmpFile->delete();
            $result = 'success';
        }
        if($foundationTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/foundationTranscripts/tmp/'. $foundationTranscriptsTmpFile->folder);
            $foundationTranscriptsTmpFile->delete();
            $result = 'success';
        }
        if($diplomaTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/diplomaTranscripts/tmp/'. $diplomaTranscriptsTmpFile->folder);
            $diplomaTranscriptsTmpFile->delete();
            $result = 'success';
        }
        if($degreeTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/degreeTranscripts/tmp/'. $degreeTranscriptsTmpFile->folder);
            $degreeTranscriptsTmpFile->delete();
            $result = 'success';
        }
        if($othersTmpFile){
            Storage::deleteDirectory('/public/images/others/tmp/'. $othersTmpFile->folder);
            $othersTmpFile->delete();
            $result = 'success';
        }
        return $result;
    }

}
