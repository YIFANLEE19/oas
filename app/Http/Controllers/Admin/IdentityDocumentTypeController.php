<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IdentityDocumentType;
use Session;

class IdentityDocumentTypeController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $identityDocumentTypes = IdentityDocumentType::all();
        return view('oas.admin.identityDocumentType.home', compact('identityDocumentTypes'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createIdentityDocumentType = IdentityDocumentType::create([
            'type' => $r->identity_document_type,
        ]);
        Session::flash('success','New identity document type created successfully.');
        return back();
    }
    /*
    |-----------------------------------------------------------
    | Update function
    |-----------------------------------------------------------
    */
    public function update()
    {
        $r = request();
        $identityDocumentType = IdentityDocumentType::find($r->id);
        ($r->identity_document_type != null ? $identityDocumentType->type = $r->identity_document_type : '');
        $identityDocumentType->save();
        Session::flash('success','Identity document type updated successfully');
        return back();
    }
}
