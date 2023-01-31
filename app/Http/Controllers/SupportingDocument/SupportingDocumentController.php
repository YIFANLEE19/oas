<?php

namespace App\Http\Controllers\SupportingDocument;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportingDocumentController extends Controller
{
    //
    public function index($id)
    {
        return view('oas.supporting_document.home');
    }
}
