<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuardianRelationship;
use Illuminate\Http\Request;
use Session;

class GuardianRelationshipController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $relationships = GuardianRelationship::all();
        return view('oas.admin.guardianRelationship.home', compact('relationships'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createRelationship = GuardianRelationship::create([
            'relationship_code' => $r->relationship_code,
            'name' => $r->relationship_name,
        ]);
        Session::flash('success','New relationship created successfully.');
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
        $relationship = GuardianRelationship::find($r->id);
        ($r->relationship_code != null) ? $relationship->relationship_code = $r->relationship_code : '';
        ($r->relationship_name != null) ? $relationship->name = $r->relationship_name : '';
        ($r->relationship_status != null) ? $relationship->status = $r->relationship_status : '';
        $relationship->save();
        Session::flash('success','Relationship updated successfully.');
        return back();
    }
}
