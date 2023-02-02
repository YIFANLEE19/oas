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
        $getIcFrontDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_FRONT'),
        ]);
        $getIcBackDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_BACK'),
        ]);

        $ic_front_tmp_file = TemporaryFile::where('folder',Session::get('icFrontFolder'))->first();
        $ic_back_tmp_file = TemporaryFile::where('folder',Session::get('icBackFolder'))->first();
        if($ic_front_tmp_file){
            Storage::copy('/public/images/icFront/tmp/' . $ic_front_tmp_file->folder. '/' . $ic_front_tmp_file->file, '/public/images/icFront/' . $ic_front_tmp_file->folder. '/' . $ic_front_tmp_file->file);
            IdentityDocumentPage::create([
                'identity_document_id' => $getIcFrontDocumentId,
                'page' => $ic_front_tmp_file->folder . '/' . $ic_front_tmp_file->file,
            ]);
            Storage::deleteDirectory('/public/images/icFront/tmp/'. $ic_front_tmp_file->folder);
            $ic_front_tmp_file->delete();
        }
        if($ic_back_tmp_file){
            Storage::copy('/public/images/icBack/tmp/' . $ic_back_tmp_file->folder. '/' . $ic_back_tmp_file->file, '/public/images/icBack/' . $ic_back_tmp_file->folder. '/' . $ic_back_tmp_file->file);
            IdentityDocumentPage::create([
                'identity_document_id' => $getIcBackDocumentId,
                'page' => $ic_back_tmp_file->folder . '/' . $ic_back_tmp_file->file,
            ]);
            Storage::deleteDirectory('/public/images/icBack/tmp/'. $ic_back_tmp_file->folder);
            $ic_back_tmp_file->delete();
        }
        return back();
    }

    public function tmpUpload(Request $request)
    {
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
        } 
        if($request->hasFile('schoolLeavingCerts')){
            $schoolLeavingCerts = $request->file('schoolLeavingCerts');
            $schoolLeavingCertsFileName = 'schoolLeavingCerts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$schoolLeavingCertsFileName->getClientOriginalName();
            $schoolLeavingCertsFolder = uniqid('schoolLeavingCerts',true);
            Session::push('schoolLeavingCertsFolder',$schoolLeavingCertsFolder);
            Session::push('schoolLeavingCertsFileName',$schoolLeavingCertsFileName);
            $schoolLeavingCerts->storeAs('/public/images/schoolLeavingCerts/tmp/' . $schoolLeavingCertsFolder, $schoolLeavingCertsFileName);
            TemporaryFile::create([
                'folder' => $schoolLeavingCertsFolder,
                'file' => $schoolLeavingCertsFileName,
            ]);
        }
        return '';
    }

    public function tmpDelete()
    {

        $ic_front_tmp_file = TemporaryFile::where('folder',Session::get('icFrontFolder'))->first();
        $ic_back_tmp_file = TemporaryFile::where('folder',Session::get('icBackFolder'))->first();
        if($ic_front_tmp_file){
            Storage::deleteDirectory('/public/images/icFront/tmp/'. $ic_front_tmp_file->folder);
            $ic_front_tmp_file->delete();
            Session::remove('icFrontFolder');
            return response('');
        }
        if($ic_back_tmp_file){
            Storage::deleteDirectory('/public/images/icBack/tmp/'. $ic_back_tmp_file->folder);
            $ic_back_tmp_file->delete();
            Session::remove('icBackFolder');
            return response('');
        }
    }

}
