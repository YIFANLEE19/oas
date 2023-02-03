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
        // if(Session::has('icFrontFolder') || Session::has('icBackFolder') || Session::has('schoolLeavingCertsFolder') || Session::has('secondarySchoolTranscriptsFolder') || Session::has('foundationTranscriptsFolder') || Session::has('diplomaTranscriptsFolder') || Session::has('degreeTranscriptsFolder') || Session::has('othersFolder')){
        //     Session::forget('icFrontFolder');
        //     Session::forget('icFrontFileName');
        //     Session::forget('icBackFolder');
        //     Session::forget('icBackFileName');
        //     Session::forget('schoolLeavingCertsFolder');
        //     Session::forget('schoolLeavingCertsFileName');
        //     Session::forget('secondarySchoolTranscriptsFolder');
        //     Session::forget('secondarySchoolTranscriptsFileName');
        //     Session::forget('foundationTranscriptsFolder');
        //     Session::forget('foundationTranscriptsFileName');
        //     Session::forget('diplomaTranscriptsFolder');
        //     Session::forget('diplomaTranscriptsFileName');
        //     Session::forget('degreeTranscriptsFolder');
        //     Session::forget('degreeTranscriptsFileName');
        //     Session::forget('othersFolder');
        //     Session::forget('othersFileName');
        // }
        Session::forget('icFrontFolder');
        Session::forget('icFrontFileName');
        Session::forget('icBackFolder');
        Session::forget('icBackFileName');
        Session::forget('schoolLeavingCertsFolder');
        Session::forget('schoolLeavingCertsFileName');
        // Session::forget('secondarySchoolTranscriptsFolder');
        // Session::forget('secondarySchoolTranscriptsFileName');
        // Session::forget('foundationTranscriptsFolder');
        // Session::forget('foundationTranscriptsFileName');
        // Session::forget('diplomaTranscriptsFolder');
        // Session::forget('diplomaTranscriptsFileName');
        // Session::forget('degreeTranscriptsFolder');
        // Session::forget('degreeTranscriptsFileName');
        // Session::forget('othersFolder');
        // Session::forget('othersFileName');
        return view('oas.supporting_document.home', compact(['APPLICATION_RECORD_ID']));
    }

    public function create(Request $request,$id)
    {
        $getIcFrontFolder = Session::get('icFrontFolder');
        $getIcFrontFileName = Session::get('icFrontFileName');
        $getIcBackFolder = Session::get('icBackFolder');
        $getIcBackFileName = Session::get('icBackFileName');
        $getSchoolLeavingCertsFolder = Session::get('schoolLeavingCertsFolder');
        $getSchoolLeavingCertsFileName = Session::get('schoolLeavingCertsFileName');
        dd($getIcBackFolder);
        // $getSecondarySchoolTranscriptsFolder = Session::get('secondarySchoolTranscriptsFolder');
        // $getSecondarySchoolTranscriptsFileName = Session::get('secondarySchoolTranscriptsFileName');
        // $getFoundationTranscriptsFolder = Session::get('foundationTranscriptsFolder');
        // $getFoundationTranscriptsFileName =  Session::get('foundationTranscriptsFileName');
        // $getDiplomaTranscriptsFolder = Session::get('diplomaTranscriptsFolder');
        // $getDiplomaTranscriptsFileName = Session::get('diplomaTranscriptsFileName');
        // $getDegreeTranscriptsFolder = Session::get('degreeTranscriptsFolder');
        // $getDegreeTranscriptsFileName = Session::get('degreeTranscriptsFileName');
        // $getOthersFolder = Session::get('othersFolder');
        // $getOthersFileName = Session::get('othersFileName');

        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        $getIcFrontDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_FRONT'),
        ]); 
        $getIcBackDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_BACK'),
        ]);
        for ($i=0; $i < count($getIcFrontFolder); $i++) { 
            $temporary = TemporaryFile::where('folder',$getIcFrontFolder[$i])->where('file',$getIcFrontFileName[$i])->first();
            if($temporary){
                $createIcFrontDocumentPage = IdentityDocumentPage::create([
                    'identity_document_id' => $getIcFrontDocumentId,
                    'page' => $getIcFrontFolder[$i].'/'. $getIcFrontFileName[$i],
                ]);
                Storage::deleteDirectory('/public/images/icFront/tmp/'. $getIcFrontFolder[$i]);
                $temporary->delete();
            }
        }
        for ($i=0; $i < count($getIcBackFolder); $i++) { 
            $temporary = TemporaryFile::where('folder',$getIcBackFolder[$i])->where('file',$getIcBackFileName[$i])->first();
            if($temporary){
                $createIcBackDocumentPage = IdentityDocumentPage::create([
                    'identity_document_id' => $getIcBackDocumentId,
                    'page' => $getIcBackFolder[$i].'/'. $getIcBackFileName[$i],
                ]);
                Storage::deleteDirectory('/public/images/icBack/tmp/'. $getIcBackFolder[$i]);
                $temporary->delete();
            }
        }



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
            $foundationTranscripts->storeAs('/public/images/foundationTranscripts/tmp/' . $foundationTranscriptsFolder, $foundationTranscriptsFileName);
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
            $schoolLeavingCertsFolderArr = array();
            $schoolLeavingCertsFileNameArr = array();
            if(Session::has('schoolLeavingCertsFolder')){
                for ($i=0; $i < count(Session::get('schoolLeavingCertsFolder')) ; $i++) { 
                    if(Session::get('schoolLeavingCertsFolder')[$i] != $schoolLeavingCertsTmpFile->folder){
                        $schoolLeavingCertsFolderArr[$i] = Session::get('schoolLeavingCertsFolder')[$i];
                    }
                }
                for ($i=0; $i < count(Session::get('schoolLeavingCertsFileName')) ; $i++) { 
                    if(Session::get('schoolLeavingCertsFileName')[$i] != $schoolLeavingCertsTmpFile->file){
                        $schoolLeavingCertsFileNameArr[$i] = Session::get('schoolLeavingCertsFileName')[$i];
                    }
                }
                Session::forget('schoolLeavingCertsFolder');
                Session::forget('schoolLeavingCertsFileName');
                Session::push('schoolLeavingCertsFolder',$schoolLeavingCertsFolderArr);
                Session::push('schoolLeavingCertsFileName',$schoolLeavingCertsFileNameArr);
                $schoolLeavingCertsTmpFile->delete();
                $result = 'success';
            }
        }
        if($secondarySchoolTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/secondarySchoolTranscripts/tmp/'. $secondarySchoolTranscriptsTmpFile->folder);
            $secondarySchoolTranscriptsFolderArr = array();
            $secondarySchoolTranscriptsFileNameArr = array();
            if(Session::has('secondarySchoolTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('secondarySchoolTranscriptsFolder')) ; $i++) { 
                    if(Session::get('secondarySchoolTranscriptsFolder')[$i] != $secondarySchoolTranscriptsTmpFile->folder){
                        $secondarySchoolTranscriptsFolderArr[$i] = Session::get('secondarySchoolTranscriptsFolder')[$i];
                    }
                }
                for ($i=0; $i < count(Session::get('secondarySchoolTranscriptsFileName')) ; $i++) { 
                    if(Session::get('secondarySchoolTranscriptsFileName')[$i] != $secondarySchoolTranscriptsTmpFile->file){
                        $secondarySchoolTranscriptsFileNameArr[$i] = Session::get('secondarySchoolTranscriptsFileName')[$i];
                    }
                }
                Session::forget('secondarySchoolTranscriptsFolder');
                Session::forget('secondarySchoolTranscriptsFileName');
                Session::push('secondarySchoolTranscriptsFolder',$secondarySchoolTranscriptsFolderArr);
                Session::push('secondarySchoolTranscriptsFileName',$secondarySchoolTranscriptsFileNameArr);
                $secondarySchoolTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($foundationTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/foundationTranscripts/tmp/'. $foundationTranscriptsTmpFile->folder);
            $foundationTranscriptsFolderArr = array();
            $foundationTranscriptsFileNameArr = array();
            if(Session::has('foundationTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('foundationTranscriptsFolder')) ; $i++) { 
                    if(Session::get('foundationTranscriptsFolder')[$i] != $foundationTranscriptsTmpFile->folder){
                        $foundationTranscriptsFolderArr[$i] = Session::get('foundationTranscriptsFolder')[$i];
                    }
                }
                for ($i=0; $i < count(Session::get('foundationTranscriptsFileName')) ; $i++) { 
                    if(Session::get('foundationTranscriptsFileName')[$i] != $foundationTranscriptsTmpFile->file){
                        $foundationTranscriptsFileNameArr[$i] = Session::get('foundationTranscriptsFileName')[$i];
                    }
                }
                Session::forget('foundationTranscriptsFolder');
                Session::forget('foundationTranscriptsFileName');
                Session::push('foundationTranscriptsFolder',$foundationTranscriptsFolderArr);
                Session::push('foundationTranscriptsFileName',$foundationTranscriptsFileNameArr);
                $foundationTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($diplomaTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/diplomaTranscripts/tmp/'. $diplomaTranscriptsTmpFile->folder);
            $diplomaTranscriptsFolderArr = array();
            $diplomaTranscriptsFileNameArr = array();
            if(Session::has('diplomaTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('diplomaTranscriptsFolder')) ; $i++) { 
                    if(Session::get('diplomaTranscriptsFolder')[$i] != $diplomaTranscriptsTmpFile->folder){
                        $diplomaTranscriptsFolderArr[$i] = Session::get('diplomaTranscriptsFolder')[$i];
                    }
                }
                for ($i=0; $i < count(Session::get('diplomaTranscriptsFileName')) ; $i++) { 
                    if(Session::get('diplomaTranscriptsFileName')[$i] != $diplomaTranscriptsTmpFile->file){
                        $diplomaTranscriptsFileNameArr[$i] = Session::get('diplomaTranscriptsFileName')[$i];
                    }
                }
                Session::forget('diplomaTranscriptsFolder');
                Session::forget('diplomaTranscriptsFileName');
                Session::push('diplomaTranscriptsFolder',$diplomaTranscriptsFolderArr);
                Session::push('diplomaTranscriptsFileName',$diplomaTranscriptsFileNameArr);
                $diplomaTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($degreeTranscriptsTmpFile){
            Storage::deleteDirectory('/public/images/degreeTranscripts/tmp/'. $degreeTranscriptsTmpFile->folder);
            $degreeTranscriptsFolderArr = array();
            $degreeTranscriptsFileNameArr = array();
            if(Session::has('degreeTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('degreeTranscriptsFolder')) ; $i++) { 
                    if(Session::get('degreeTranscriptsFolder')[$i] != $degreeTranscriptsTmpFile->folder){
                        $degreeTranscriptsFolderArr[$i] = Session::get('degreeTranscriptsFolder')[$i];
                    }
                }
                for ($i=0; $i < count(Session::get('degreeTranscriptsFileName')) ; $i++) { 
                    if(Session::get('degreeTranscriptsFileName')[$i] != $degreeTranscriptsTmpFile->file){
                        $degreeTranscriptsFileNameArr[$i] = Session::get('degreeTranscriptsFileName')[$i];
                    }
                }
                Session::forget('degreeTranscriptsFolder');
                Session::forget('degreeTranscriptsFileName');
                Session::push('degreeTranscriptsFolder',$degreeTranscriptsFolderArr);
                Session::push('degreeTranscriptsFileName',$degreeTranscriptsFileNameArr);
                $degreeTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($othersTmpFile){
            Storage::deleteDirectory('/public/images/others/tmp/'. $othersTmpFile->folder);
            $othersFolderArr = array();
            $othersFileNameArr = array();
            if(Session::has('othersFolder')){
                for ($i=0; $i < count(Session::get('othersFolder')) ; $i++) { 
                    if(Session::get('othersFolder')[$i] != $othersTmpFile->folder){
                        $othersFolderArr[$i] = Session::get('othersFolder')[$i];
                    }
                }
                for ($i=0; $i < count(Session::get('othersFileName')) ; $i++) { 
                    if(Session::get('othersFileName')[$i] != $othersTmpFile->file){
                        $othersFileNameArr[$i] = Session::get('othersFileName')[$i];
                    }
                }
                Session::forget('othersFolder');
                Session::forget('othersFileName');
                Session::push('othersFolder',$othersFolderArr);
                Session::push('othersFileName',$othersFileNameArr);
                $othersTmpFile->delete();
                $result = 'success';
            }
        }
        return $result;
    }
}
