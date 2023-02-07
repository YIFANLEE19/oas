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
use App\Models\AcademicRecord;
use App\Models\SupportingDocument;
use App\Models\AcademicTranscript;
use App\Models\ApplicationStatusLog;
use Auth;
use Session;

class SupportingDocumentController extends Controller
{
    //
    public function removeSession()
    {
        Session::forget('icFrontFolder');
        Session::forget('icFrontFileName');
        Session::forget('icBackFolder');
        Session::forget('icBackFileName');
        Session::forget('schoolLeavingCertsFolder');
        Session::forget('schoolLeavingCertsFileName');
        Session::forget('secondarySchoolTranscriptsFolder');
        Session::forget('secondarySchoolTranscriptsFileName');
        Session::forget('upperSecondarySchoolTranscriptsFolder');
        Session::forget('upperSecondarySchoolTranscriptsFileName');
        Session::forget('foundationTranscriptsFolder');
        Session::forget('foundationTranscriptsFileName');
        Session::forget('diplomaTranscriptsFolder');
        Session::forget('diplomaTranscriptsFileName');
        Session::forget('degreeTranscriptsFolder');
        Session::forget('degreeTranscriptsFileName');
        Session::forget('othersFolder');
        Session::forget('othersFileName');
    }
    public function index($id)
    {
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        // Application status log
        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        $this->removeSession();
        return view('oas.supporting_document.home', compact(['APPLICATION_RECORD_ID','getApplicationStatusLog']));
    }

    public function create($id)
    {
        $getIcFrontFolder = Session::get('icFrontFolder');
        $getIcFrontFileName = Session::get('icFrontFileName');
        $getIcBackFolder = Session::get('icBackFolder');
        $getIcBackFileName = Session::get('icBackFileName');
        $getSchoolLeavingCertsFolder = Session::get('schoolLeavingCertsFolder');
        $getSchoolLeavingCertsFileName = Session::get('schoolLeavingCertsFileName');
        $getSecondarySchoolTranscriptsFolder = Session::get('secondarySchoolTranscriptsFolder');
        $getSecondarySchoolTranscriptsFileName = Session::get('secondarySchoolTranscriptsFileName');
        $getUpperSecondarySchoolTranscriptsFolder = Session::get('upperSecondarySchoolTranscriptsFolder');
        $getUpperSecondarySchoolTranscriptsFileName = Session::get('upperSecondarySchoolTranscriptsFileName');
        $getFoundationTranscriptsFolder = Session::get('foundationTranscriptsFolder');
        $getFoundationTranscriptsFileName =  Session::get('foundationTranscriptsFileName');
        $getDiplomaTranscriptsFolder = Session::get('diplomaTranscriptsFolder');
        $getDiplomaTranscriptsFileName = Session::get('diplomaTranscriptsFileName');
        $getDegreeTranscriptsFolder = Session::get('degreeTranscriptsFolder');
        $getDegreeTranscriptsFileName = Session::get('degreeTranscriptsFileName');
        $getOthersFolder = Session::get('othersFolder');
        $getOthersFileName = Session::get('othersFileName');
        $APPLICATION_RECORD_ID = Crypt::decrypt($id);
        // get school level record id
        $getSecondarySchoolRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.SECONDARY'))->first();
        $getUpperSecondarySchoolRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.UPPERSECONDARY'))->first();
        $getFoundationRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.FOUNDATION'))->first();
        $getDiplomaRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.DIPLOMA'))->first();
        $getDegreeRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.DEGREE'))->first();
        $getPhdRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.PHD'))->first();
        $getMasterRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.MASTER'))->first();
        $getOtherRecordId = AcademicRecord::where('application_record_id',$APPLICATION_RECORD_ID)->where('school_level_id',config('constants.SCHOOL_LEVEL.OTHER'))->first();
        // create ic front document 
        $getIcFrontDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_FRONT'),
        ]); 
        $getIcBackDocumentId = IdentityDocument::insertGetId([
            'application_record_id' => $APPLICATION_RECORD_ID,
            'identity_document_type_id' => config('constants.IDENTITY_DOCUEMENT_TYPE.IC_BACK'),
        ]);
        for($i=0; $i < count($getIcFrontFolder); $i++) {
            $temporary = TemporaryFile::where('folder',$getIcFrontFolder[$i])->where('file',$getIcFrontFileName[$i])->first();
            if($temporary){
                $createIcFrontDocumentPage = IdentityDocumentPage::create([
                    'identity_document_id' => $getIcFrontDocumentId,
                    'page' => Crypt::encrypt($getIcFrontFolder[$i].'/'. $getIcFrontFileName[$i]),
                ]);
                Storage::move('/public/images/icFront/tmp/'.$getIcFrontFolder[$i].'/'.$getIcFrontFileName[$i], '/public/images/icFront/'.$getIcFrontFolder[$i].'/'.$getIcFrontFileName[$i]);
                Storage::deleteDirectory('/public/images/icFront/tmp/'. $getIcFrontFolder[$i]);
                $temporary->delete();
            }
        }
        for($i=0; $i < count($getIcFrontFolder); $i++) {
            $temporary = TemporaryFile::where('folder',$getIcBackFolder[$i])->where('file',$getIcBackFileName[$i])->first();
            if($temporary){
                $createIcBackDocumentPage = IdentityDocumentPage::create([
                    'identity_document_id' => $getIcBackDocumentId,
                    'page' => Crypt::encrypt($getIcBackFolder[$i].'/'. $getIcBackFileName[$i]),
                ]);
                Storage::move('/public/images/icBack/tmp/'.$getIcBackFolder[$i].'/'.$getIcBackFileName[$i], '/public/images/icBack/'.$getIcBackFolder[$i].'/'.$getIcBackFileName[$i]);
                Storage::deleteDirectory('/public/images/icBack/tmp/'. $getIcBackFolder[$i]);
                $temporary->delete();
            }
        }
        for($i=0; $i < count($getSchoolLeavingCertsFolder); $i++) {
            $temporary = TemporaryFile::where('folder',$getSchoolLeavingCertsFolder[$i])->where('file',$getSchoolLeavingCertsFileName[$i])->first();
            if($temporary){
                $getLeavingCertDocumentId = SupportingDocument::insertGetId([
                    'doc' => Crypt::encrypt($getSchoolLeavingCertsFolder[$i].'/'. $getSchoolLeavingCertsFileName[$i]),
                    'isCert' => config('constants.IS_CERT.TRUE'),
                ]);
                $createAcademicTranscript = AcademicTranscript::create([
                    'academic_record_id' => $getSecondarySchoolRecordId->id,
                    'supporting_document_id' => $getLeavingCertDocumentId,
                    'school_level_id' => config('constants.SCHOOL_LEVEL.SECONDARY'),
                ]);
                Storage::move('/public/images/schoolLeavingCerts/tmp/'.$getSchoolLeavingCertsFolder[$i].'/'.$getSchoolLeavingCertsFileName[$i], '/public/images/schoolLeavingCerts/'.$getSchoolLeavingCertsFolder[$i].'/'.$getSchoolLeavingCertsFileName[$i]);
                Storage::deleteDirectory('/public/images/schoolLeavingCerts/tmp/'. $getSchoolLeavingCertsFolder[$i]);
                $temporary->delete();
            }
        }
        for($i=0; $i < count($getSecondarySchoolTranscriptsFolder); $i++){
            $temporary = TemporaryFile::where('folder',$getSecondarySchoolTranscriptsFolder[$i])->where('file',$getSecondarySchoolTranscriptsFileName[$i])->first();
            if($temporary){
                $getSecondarySchoolTranscriptDocumentId = SupportingDocument::insertGetId([
                    'doc' => Crypt::encrypt($getSecondarySchoolTranscriptsFolder[$i].'/'. $getSecondarySchoolTranscriptsFileName[$i]),
                    'isCert' => config('constants.IS_CERT.FALSE'), 
                ]);
                $createAcademicTranscript = AcademicTranscript::create([
                    'academic_record_id' => $getSecondarySchoolRecordId->id,
                    'supporting_document_id' => $getSecondarySchoolTranscriptDocumentId,
                    'school_level_id' => config('constants.SCHOOL_LEVEL.SECONDARY'),
                ]);
                Storage::move('/public/images/secondarySchoolTranscripts/tmp/'.$getSecondarySchoolTranscriptsFolder[$i].'/'.$getSecondarySchoolTranscriptsFileName[$i], '/public/images/secondarySchoolTranscripts/'.$getSecondarySchoolTranscriptsFolder[$i].'/'.$getSecondarySchoolTranscriptsFileName[$i]);
                Storage::deleteDirectory('/public/images/secondarySchoolTranscripts/tmp/'. $getSecondarySchoolTranscriptsFolder[$i]);
                $temporary->delete();
            }
        }

        if(Session::has('upperSecondarySchoolTranscriptsFolder')){
            for($i=0; $i < count($getUpperSecondarySchoolTranscriptsFolder); $i++){
                $temporary = TemporaryFile::where('folder',$getUpperSecondarySchoolTranscriptsFolder[$i])->where('file',$getUpperSecondarySchoolTranscriptsFileName[$i])->first();
                if($temporary){
                    $getUpperSecondarySchoolTranscriptDocumentId = SupportingDocument::insertGetId([
                        'doc' => Crypt::encrypt($getUpperSecondarySchoolTranscriptsFolder[$i].'/'. $getUpperSecondarySchoolTranscriptsFileName[$i]),
                        'isCert' => config('constants.IS_CERT.FALSE'), 
                    ]);
                    $createAcademicTranscript = AcademicTranscript::create([
                        'academic_record_id' => $getUpperSecondarySchoolRecordId->id,
                        'supporting_document_id' => $getUpperSecondarySchoolTranscriptDocumentId,
                        'school_level_id' => config('constants.SCHOOL_LEVEL.UPPERSECONDARY'),
                    ]);
                    Storage::move('/public/images/upperSecondarySchoolTranscripts/tmp/'.$getUpperSecondarySchoolTranscriptsFolder[$i].'/'.$getUpperSecondarySchoolTranscriptsFileName[$i], '/public/images/upperSecondarySchoolTranscripts/'.$getUpperSecondarySchoolTranscriptsFolder[$i].'/'.$getUpperSecondarySchoolTranscriptsFileName[$i]);
                    Storage::deleteDirectory('/public/images/secondarySchoolTranscripts/tmp/'. $getUpperSecondarySchoolTranscriptsFolder[$i]);
                    $temporary->delete();
                }
            }
        }
        if(Session::has('foundationTranscriptsFolder')){
            for($i=0; $i < count($getFoundationTranscriptsFolder); $i++){
                $temporary = TemporaryFile::where('folder',$getFoundationTranscriptsFolder[$i])->where('file',$getFoundationTranscriptsFileName[$i])->first();
                if($temporary){
                    $getFoundationTranscriptDocumentId = SupportingDocument::insertGetId([
                        'doc' => Crypt::encrypt($getFoundationTranscriptsFolder[$i].'/'. $getFoundationTranscriptsFileName[$i]),
                        'isCert' => config('constants.IS_CERT.FALSE'), 
                    ]);
                    $createAcademicTranscript = AcademicTranscript::create([
                        'academic_record_id' => $getFoundationRecordId->id,
                        'supporting_document_id' => $getFoundationTranscriptDocumentId,
                        'school_level_id' => config('constants.SCHOOL_LEVEL.FOUNDATION'),
                    ]);
                    Storage::move('/public/images/foundationTranscripts/tmp/'.$getFoundationTranscriptsFolder[$i].'/'.$getFoundationTranscriptsFileName[$i], '/public/images/foundationTranscripts/'.$getFoundationTranscriptsFolder[$i].'/'.$getFoundationTranscriptsFileName[$i]);
                    Storage::deleteDirectory('/public/images/foundationTranscripts/tmp/'. $getFoundationTranscriptsFolder[$i]);
                    $temporary->delete();
                }
            }
        }
        if(Session::has('diplomaTranscriptsFolder')){
            for($i=0; $i < count($getDiplomaTranscriptsFolder); $i++){
                $temporary = TemporaryFile::where('folder',$getDiplomaTranscriptsFolder[$i])->where('file',$getDiplomaTranscriptsFileName[$i])->first();
                if($temporary){
                    $getDiplomaTranscriptDocumentId = SupportingDocument::insertGetId([
                        'doc' => Crypt::encrypt($getDiplomaTranscriptsFolder[$i].'/'. $getDiplomaTranscriptsFileName[$i]),
                        'isCert' => config('constants.IS_CERT.FALSE'), 
                    ]);
                    $createAcademicTranscript = AcademicTranscript::create([
                        'academic_record_id' => $getDiplomaRecordId->id,
                        'supporting_document_id' => $getDiplomaTranscriptDocumentId,
                        'school_level_id' => config('constants.SCHOOL_LEVEL.DIPLOMA'),
                    ]);
                    Storage::move('/public/images/diplomaTranscripts/tmp/'.$getDiplomaTranscriptsFolder[$i].'/'.$getDiplomaTranscriptsFileName[$i], '/public/images/diplomaTranscripts/'.$getDiplomaTranscriptsFolder[$i].'/'.$getDiplomaTranscriptsFileName[$i]);
                    Storage::deleteDirectory('/public/images/diplomaTranscripts/tmp/'. $getDiplomaTranscriptsFolder[$i]);
                    $temporary->delete();
                }
            }
        }
        if(Session::has('degreeTranscriptsFolder')){
            for($i=0; $i < count($getDegreeTranscriptsFolder); $i++){
                $temporary = TemporaryFile::where('folder',$getDegreeTranscriptsFolder[$i])->where('file',$getDegreeTranscriptsFileName[$i])->first();
                if($temporary){
                    $getDegreeTranscriptDocumentId = SupportingDocument::insertGetId([
                        'doc' => Crypt::encrypt($getDegreeTranscriptsFolder[$i].'/'. $getDegreeTranscriptsFileName[$i]),
                        'isCert' => config('constants.IS_CERT.FALSE'), 
                    ]);
                    $createAcademicTranscript = AcademicTranscript::create([
                        'academic_record_id' => $getDegreeRecordId->id,
                        'supporting_document_id' => $getDegreeTranscriptDocumentId,
                        'school_level_id' => config('constants.SCHOOL_LEVEL.DEGREE'),
                    ]);
                    Storage::move('/public/images/degreeTranscripts/tmp/'.$getDegreeTranscriptsFolder[$i].'/'.$getDegreeTranscriptsFileName[$i], '/public/images/degreeTranscripts/'.$getDegreeTranscriptsFolder[$i].'/'.$getDegreeTranscriptsFileName[$i]);
                    Storage::deleteDirectory('/public/images/degreeTranscripts/tmp/'. $getDegreeTranscriptsFolder[$i]);
                    $temporary->delete();
                }
            }
        }
        if(Session::has('othersFolder')){
            for($i=0; $i < count($getOthersFolder); $i++){
                $temporary = TemporaryFile::where('folder',$getOthersFolder[$i])->where('file',$getOthersFileName[$i])->first();
                if($temporary){
                    $getOthersDocumentId = SupportingDocument::insertGetId([
                        'doc' => Crypt::encrypt($getOthersFolder[$i].'/'. $getOthersFileName[$i]),
                        'isCert' => config('constants.IS_CERT.FALSE'), 
                    ]);
                    $createAcademicTranscript = AcademicTranscript::create([
                        'academic_record_id' => $getOtherRecordId->id,
                        'supporting_document_id' => $getOthersDocumentId,
                        'school_level_id' => config('constants.SCHOOL_LEVEL.OTHER'),
                    ]);
                    Storage::move('/public/images/others/tmp/'.$getOthersFolder[$i].'/'.$getOthersFileName[$i], '/public/images/others/'.$getOthersFolder[$i].'/'.$getOthersFileName[$i]);
                    Storage::deleteDirectory('/public/images/others/tmp/'. $getOthersFolder[$i]);
                    $temporary->delete();
                }
            }
        }
        $this->removeSession();
        $getApplicationStatusLog = ApplicationStatusLog::where('user_id', Auth::id())->where('application_record_id',$APPLICATION_RECORD_ID)->first();
        $getApplicationStatusLog->application_status_id = config('constants.APPLICATION_STATUS_CODE.COMPLETE_SUPPORTING_DOCUEMENT');
        $getApplicationStatusLog->save();
        return redirect()->route('payment.home',['id'=> Crypt::encrypt($APPLICATION_RECORD_ID)]);
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
        if($request->hasFile('upperSecondarySchoolTranscripts')){
            $upperSecondarySchoolTranscripts = $request->file('upperSecondarySchoolTranscripts');
            $upperSecondarySchoolTranscriptsFileName = 'upperSecondarySchoolTranscripts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$upperSecondarySchoolTranscripts->getClientOriginalName();
            $upperSecondarySchoolTranscriptsFolder = uniqid('upperSecondarySchoolTranscripts',true);
            Session::push('upperSecondarySchoolTranscriptsFolder',$upperSecondarySchoolTranscriptsFolder);
            Session::push('upperSecondarySchoolTranscriptsFileName',$upperSecondarySchoolTranscriptsFileName);
            $upperSecondarySchoolTranscripts->storeAs('/public/images/upperSecondarySchoolTranscripts/tmp/' . $upperSecondarySchoolTranscriptsFolder, $upperSecondarySchoolTranscriptsFileName);
            TemporaryFile::create([
                'folder' => $upperSecondarySchoolTranscriptsFolder,
                'file' => $upperSecondarySchoolTranscriptsFileName,
            ]);
            $folderName = $upperSecondarySchoolTranscriptsFolder;
        } 
        if($request->hasFile('foundationTranscripts')){
            $foundationTranscripts = $request->file('foundationTranscripts');
            $foundationTranscriptsFileName = 'foundationTranscripts_'.Auth::user()->name.'_'.date('YmdHii').'_'.$foundationTranscripts->getClientOriginalName();
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
        $upperSecondarySchoolTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $foundationTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $diplomaTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $degreeTranscriptsTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $othersTmpFile = TemporaryFile::where('folder',$request->file)->first();
        $result = 'not found';
        
        if($icFrontTmpFile){
            $icFrontFolderArr = array();
            $icFrontFileNameArr = array();   
            if(Session::has('icFrontFolder')){
                for($i=0; $i < count(Session::get('icFrontFolder')); $i++){
                    if(Session::get('icFrontFolder')[$i] != $icFrontTmpFile->folder){
                        array_push($icFrontFolderArr, Session::get('icFrontFolder')[$i]);
                    }
                }
                for($i=0; $i < count(Session::get('icFrontFileName')); $i++){
                    if(Session::get('icFrontFileName')[$i] != $icFrontTmpFile->file){
                        array_push($icFrontFileNameArr, Session::get('icFrontFileName')[$i]);
                    }
                }
                Session::forget(['icFrontFolder','icFrontFileName']);
                for($i=0; $i< sizeof($icFrontFolderArr); $i++){
                    Session::push('icFrontFolder', $icFrontFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($icFrontFileNameArr); $i++){
                    Session::push('icFrontFileName', $icFrontFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/icFront/tmp/'. $icFrontTmpFile->folder);
                $icFrontTmpFile->delete();
                $result = 'success';
            }
        }
        if($icBackTmpFile){
            $icBackFolderArr = array();
            $icBackFileNameArr = array();   
            if(Session::has('icBackFolder')){
                for($i=0; $i < count(Session::get('icBackFolder')); $i++){
                    if(Session::get('icBackFolder')[$i] != $icBackTmpFile->folder){
                        array_push($icBackFolderArr, Session::get('icBackFolder')[$i]);
                    }
                }
                for($i=0; $i < count(Session::get('icBackFileName')); $i++){
                    if(Session::get('icBackFileName')[$i] != $icBackTmpFile->file){
                        array_push($icBackFileNameArr, Session::get('icBackFileName')[$i]);
                    }
                }
                Session::forget(['icBackFolder','icBackFileName']);
                for($i=0; $i< sizeof($icBackFolderArr); $i++){
                    Session::push('icBackFolder', $icBackFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($icBackFileNameArr); $i++){
                    Session::push('icBackFileName', $icBackFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/icBack/tmp/'. $icBackTmpFile->folder);
                $icBackTmpFile->delete();
                $result = 'success';
            }
        }
        if($schoolLeavingCertsTmpFile){
            $schoolLeavingCertsFolderArr = array();
            $schoolLeavingCertsFileNameArr = array();       
            if(Session::has('schoolLeavingCertsFolder')){
                for($i=0; $i < count(Session::get('schoolLeavingCertsFolder')); $i++){
                    if(Session::get('schoolLeavingCertsFolder')[$i] != $schoolLeavingCertsTmpFile->folder){
                        array_push($schoolLeavingCertsFolderArr, Session::get('schoolLeavingCertsFolder')[$i]);
                    }
                }
                for($i=0; $i < count(Session::get('schoolLeavingCertsFileName')); $i++){
                    if(Session::get('schoolLeavingCertsFileName')[$i] != $schoolLeavingCertsTmpFile->file){
                        array_push($schoolLeavingCertsFileNameArr, Session::get('schoolLeavingCertsFileName')[$i]);
                    }
                }
                Session::forget(['schoolLeavingCertsFolder','schoolLeavingCertsFileName']);
                for($i=0; $i< sizeof($schoolLeavingCertsFolderArr); $i++){
                    Session::push('schoolLeavingCertsFolder', $schoolLeavingCertsFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($schoolLeavingCertsFileNameArr); $i++){
                    Session::push('schoolLeavingCertsFileName', $schoolLeavingCertsFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/schoolLeavingCerts/tmp/'. $schoolLeavingCertsTmpFile->folder);
                $schoolLeavingCertsTmpFile->delete();
                $result = 'success';
            }   
        }
        if($secondarySchoolTranscriptsTmpFile){
            $secondarySchoolTranscriptsFolderArr = array();
            $secondarySchoolTranscriptsFileNameArr = array();
            if(Session::has('secondarySchoolTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('secondarySchoolTranscriptsFolder')) ; $i++) { 
                    if(Session::get('secondarySchoolTranscriptsFolder')[$i] != $secondarySchoolTranscriptsTmpFile->folder){
                        array_push($secondarySchoolTranscriptsFolderArr, Session::get('secondarySchoolTranscriptsFolder')[$i]);
                    }
                }
                for ($i=0; $i < count(Session::get('secondarySchoolTranscriptsFileName')) ; $i++) { 
                    if(Session::get('secondarySchoolTranscriptsFileName')[$i] != $secondarySchoolTranscriptsTmpFile->file){
                        array_push($secondarySchoolTranscriptsFileNameArr, Session::get('secondarySchoolTranscriptsFileName')[$i]);
                    }
                }
                Session::forget(['secondarySchoolTranscriptsFolder','secondarySchoolTranscriptsFileName']);
                for($i=0; $i< sizeof($secondarySchoolTranscriptsFolderArr); $i++){
                    Session::push('secondarySchoolTranscriptsFolder', $secondarySchoolTranscriptsFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($secondarySchoolTranscriptsFileNameArr); $i++){
                    Session::push('secondarySchoolTranscriptsFileName', $secondarySchoolTranscriptsFileNameArr[$i]);
                }
                Storage::deleteDirectory('/public/images/secondarySchoolTranscripts/tmp/'. $secondarySchoolTranscriptsTmpFile->folder);
                $secondarySchoolTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($upperSecondarySchoolTranscriptsTmpFile){
            $upperSecondarySchoolTranscriptsFolderArr = array();
            $upperSecondarySchoolTranscriptsFileNameArr = array();
            if(Session::has('upperSecondarySchoolTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('upperSecondarySchoolTranscriptsFolder')) ; $i++) { 
                    if(Session::get('upperSecondarySchoolTranscriptsFolder')[$i] != $upperSecondarySchoolTranscriptsTmpFile->folder){
                        array_push($upperSecondarySchoolTranscriptsFolderArr, Session::get('upperSecondarySchoolTranscriptsFolder')[$i]);
                    }
                }
                for ($i=0; $i < count(Session::get('upperSecondarySchoolTranscriptsFileName')) ; $i++) { 
                    if(Session::get('upperSecondarySchoolTranscriptsFileName')[$i] != $upperSecondarySchoolTranscriptsTmpFile->file){
                        array_push($upperSecondarySchoolTranscriptsFileNameArr, Session::get('upperSecondarySchoolTranscriptsFileName')[$i]);
                    }
                }
                Session::forget(['upperSecondarySchoolTranscriptsFolder','upperSecondarySchoolTranscriptsFileName']);
                for($i=0; $i< sizeof($upperSecondarySchoolTranscriptsFolderArr); $i++){
                    Session::push('upperSecondarySchoolTranscriptsFolder', $upperSecondarySchoolTranscriptsFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($upperSecondarySchoolTranscriptsFileNameArr); $i++){
                    Session::push('upperSecondarySchoolTranscriptsFileName', $upperSecondarySchoolTranscriptsFileNameArr[$i]);
                }
                Storage::deleteDirectory('/public/images/upperSecondarySchoolTranscripts/tmp/'. $upperSecondarySchoolTranscriptsTmpFile->folder);
                $upperSecondarySchoolTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($foundationTranscriptsTmpFile){
            $foundationTranscriptsFolderArr = array();
            $foundationTranscriptsFileNameArr = array();
            if(Session::has('foundationTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('foundationTranscriptsFolder')) ; $i++) { 
                    if(Session::get('foundationTranscriptsFolder')[$i] != $foundationTranscriptsTmpFile->folder){
                        array_push($foundationTranscriptsFolderArr, Session::get('foundationTranscriptsFolder')[$i]);
                    }
                }
                for ($i=0; $i < count(Session::get('foundationTranscriptsFileName')) ; $i++) { 
                    if(Session::get('foundationTranscriptsFileName')[$i] != $foundationTranscriptsTmpFile->file){
                        array_push($foundationTranscriptsFileNameArr, Session::get('foundationTranscriptsFileName')[$i]);
                    }
                }
                Session::forget(['foundationTranscriptsFolder','foundationTranscriptsFileName']);
                for($i=0; $i< sizeof($foundationTranscriptsFolderArr); $i++){
                    Session::push('foundationTranscriptsFolder', $foundationTranscriptsFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($foundationTranscriptsFileNameArr); $i++){
                    Session::push('foundationTranscriptsFileName', $foundationTranscriptsFileNameArr[$i]);
                }
                Storage::deleteDirectory('/public/images/foundationTranscripts/tmp/'. $foundationTranscriptsTmpFile->folder);
                $foundationTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($diplomaTranscriptsTmpFile){
            $diplomaTranscriptsFolderArr = array();
            $diplomaTranscriptsFileNameArr = array();
            if(Session::has('diplomaTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('diplomaTranscriptsFolder')) ; $i++) { 
                    if(Session::get('diplomaTranscriptsFolder')[$i] != $diplomaTranscriptsTmpFile->folder){
                        array_push($diplomaTranscriptsFolderArr, Session::get('diplomaTranscriptsFolder')[$i]);
                    }
                }
                for ($i=0; $i < count(Session::get('diplomaTranscriptsFileName')) ; $i++) { 
                    if(Session::get('diplomaTranscriptsFileName')[$i] != $diplomaTranscriptsTmpFile->file){
                        array_push($diplomaTranscriptsFileNameArr, Session::get('diplomaTranscriptsFileName')[$i]);
                    }
                }
                Session::forget(['diplomaTranscriptsFolder','diplomaTranscriptsFileName']);
                for($i=0; $i< sizeof($diplomaTranscriptsFolderArr); $i++){
                    Session::push('diplomaTranscriptsFolder', $diplomaTranscriptsFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($diplomaTranscriptsFileNameArr); $i++){
                    Session::push('diplomaTranscriptsFileName', $diplomaTranscriptsFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/diplomaTranscripts/tmp/'. $diplomaTranscriptsTmpFile->folder);
                $diplomaTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($degreeTranscriptsTmpFile){
            $degreeTranscriptsFolderArr = array();
            $degreeTranscriptsFileNameArr = array();
            if(Session::has('degreeTranscriptsFolder')){
                for ($i=0; $i < count(Session::get('degreeTranscriptsFolder')) ; $i++) { 
                    if(Session::get('degreeTranscriptsFolder')[$i] != $degreeTranscriptsTmpFile->folder){
                        array_push($degreeTranscriptsFolderArr, Session::get('degreeTranscriptsFolder')[$i]);
                    }
                }
                for ($i=0; $i < count(Session::get('degreeTranscriptsFileName')) ; $i++) { 
                    if(Session::get('degreeTranscriptsFileName')[$i] != $degreeTranscriptsTmpFile->file){
                        array_push($degreeTranscriptsFileNameArr, Session::get('degreeTranscriptsFileName')[$i]);
                    }
                }
                Session::forget(['degreeTranscriptsFolder','degreeTranscriptsFileName']);
                for($i=0; $i< sizeof($degreeTranscriptsFolderArr); $i++){
                    Session::push('degreeTranscriptsFolder', $degreeTranscriptsFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($degreeTranscriptsFileNameArr); $i++){
                    Session::push('degreeTranscriptsFileName', $degreeTranscriptsFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/degreeTranscripts/tmp/'. $degreeTranscriptsTmpFile->folder);
                $degreeTranscriptsTmpFile->delete();
                $result = 'success';
            }
        }
        if($othersTmpFile){
            $othersFolderArr = array();
            $othersFileNameArr = array();
            if(Session::has('othersFolder')){
                for ($i=0; $i < count(Session::get('othersFolder')) ; $i++) { 
                    if(Session::get('othersFolder')[$i] != $othersTmpFile->folder){
                        array_push($othersFolderArr, Session::get('othersFolder')[$i]);
                    }
                }
                for ($i=0; $i < count(Session::get('othersFileName')) ; $i++) { 
                    if(Session::get('othersFileName')[$i] != $othersTmpFile->file){
                        array_push($othersFileNameArr, Session::get('othersFileName')[$i]);
                    }
                }
                Session::forget(['othersFolder','othersFileName']);
                for($i=0; $i< sizeof($othersFolderArr); $i++){
                    Session::push('othersFolder', $othersFolderArr[$i]);
                } 
                for($i=0; $i< sizeof($othersFileNameArr); $i++){
                    Session::push('othersFileName', $othersFileNameArr[$i]);
                } 
                Storage::deleteDirectory('/public/images/others/tmp/'. $othersTmpFile->folder);
                $othersTmpFile->delete();
                $result = 'success';
            }
        }
        return $result;
    }
}
