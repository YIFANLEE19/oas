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
        return view('oas.supporting_document.home', compact(['APPLICATION_RECORD_ID']));
    }

    public function create(Request $request,$id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        // submit ic front & back
        $getIcFrontDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_FRONT'),
        ]);
        $getIcBackDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_BACK'),
        ]);

        $icFrontTmpFile = TemporaryFile::where('folder',Session::get('icFrontFolder'))->first();
        $icBackTmpFile = TemporaryFile::where('folder',Session::get('icBackFolder'))->first();
        if($icFrontTmpFile){
            Storage::copy('/public/images/icFront/tmp/' . $icFrontTmpFile->folder. '/' . $icFrontTmpFile->file, '/public/images/icFront/' . $icFrontTmpFile->folder. '/' . $icFrontTmpFile->file);
            IdentityDocumentPage::create([
                'identity_document_id' => $getIcFrontDocumentId,
                'page' => Crypt::encrypt($icFrontTmpFile->folder . '/' . $icFrontTmpFile->file),
            ]);
            Storage::deleteDirectory('/public/images/icFront/tmp/'. $icFrontTmpFile->folder);
            $icFrontTmpFile->delete();
        }
        if($icBackTmpFile){
            Storage::copy('/public/images/icBack/tmp/' . $icBackTmpFile->folder. '/' . $icBackTmpFile->file, '/public/images/icBack/' . $icBackTmpFile->folder. '/' . $icBackTmpFile->file);
            IdentityDocumentPage::create([
                'identity_document_id' => $getIcBackDocumentId,
                'page' => Crypt::encrypt($icBackTmpFile->folder . '/' . $icBackTmpFile->file),
            ]);
            Storage::deleteDirectory('/public/images/icBack/tmp/'. $icBackTmpFile->folder);
            $icBackTmpFile->delete();
        }
        Session::forgot('icFrontFolder');
        Session::forgot('icBackFolder');
        return back();
    }

    public function tmpUpload(Request $request)
    {
        $testarr = array();
        if($request->hasFile('icFront')){
            $icFront = $request->file('icFront');
            $icFrontFileName = 'icFront_'.Auth::user()->name.'_'.date('YmdHii').'_'.$icFront->getClientOriginalName();
            $icFrontFolder = uniqid('icFront',true);
            Session::put('icFrontFolder',$icFrontFolder);
            $icFront->storeAs('/public/images/icFront/tmp/' . $icFrontFolder, $icFrontFileName);
            TemporaryFile::create([
                'folder' => $icFrontFolder,
                'file' => $icFrontFileName,
            ]);
            return $icFrontFolder;
        }
        if($request->hasFile('icBack')){
            $icBack = $request->file('icBack');
            $icBackFileName = 'icBack_'.Auth::user()->name.'_'.date('YmdHii').'_'.$icBack->getClientOriginalName();
            $icBackFolder = uniqid('icBack',true);
            Session::put('icBackFolder',$icBackFolder);
            $icBack->storeAs('/public/images/icBack/tmp/' . $icBackFolder, $icBackFileName);
            TemporaryFile::create([
                'folder' => $icBackFolder,
                'file' => $icBackFileName,
            ]);
            return $icBackFolder;
        } 
        return '';
    }

    public function tmpDelete(Request $request)
    {

        $icFrontTmpFile = TemporaryFile::where('folder',Session::get('icFrontFolder'))->first();
        $icBackTmpFile = TemporaryFile::where('folder',Session::get('icBackFolder'))->first();

        if($icFrontTmpFile){
            Storage::deleteDirectory('/public/images/icFront/tmp/'. $icFrontTmpFile->folder);
            $icFrontTmpFile->delete();
            Session::forget('icFrontFolder');
            return response('');
        }
        if($icBackTmpFile){
            Storage::deleteDirectory('/public/images/icBack/tmp/'. $icBackTmpFile->folder);
            $icBackTmpFile->delete();
            Session::forget('icBackFolder');
            return response('');
        }
    }

}
