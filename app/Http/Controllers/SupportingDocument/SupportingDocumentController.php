<?php

namespace App\Http\Controllers\SupportingDocument;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        $count = 0;
        $getAllSecondarySchoolLeavingCerts = $request->file('schoolLeavingCerts');
        dd($count);
    }

}
