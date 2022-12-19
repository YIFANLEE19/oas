<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\GuardianRelationship;
use Illuminate\Http\Request;
use Session;

class GuardianRelationshipController extends Controller
{
    //
    public function index()
    {
        $relationships = GuardianRelationship::all();
        return view('oas.superadmin.guardian_relationship.home', compact('relationships'));
    }
    /**
     * create new relationship function
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
        /**
     * update relationship function
     */
    public function update()
    {
        $r = request();
        $relationship = GuardianRelationship::find($r->id);
        if($r->relationship_code != '' && $r->relationship_name != '' && $r->relationship_status != ''){
            $relationship->relationship_code = $r->relationship_code;
            $relationship->name = $r->relationship_name;
            $relationship->status = $r->relationship_status;
        }
        else if($r->relationship_code != '' && $r->relationship_name != '' && $r->relationship_status == ''){
            $relationship->relationship_code = $r->relationship_code;
            $relationship->name = $r->relationship_name;
        }
        else if($r->relationship_code == '' && $r->relationship_name != '' && $r->relationship_status != ''){
            $relationship->name = $r->relationship_name;
            $relationship->status = $r->relationship_status;
        }
        else if($r->relationship_code != '' && $r->relationship_name == '' && $r->relationship_status != ''){
            $relationship->relationship_code = $r->relationship_code;
            $relationship->status = $r->relationship_status;
        }
        else if($r->relationship_code != '' && $r->relationship_name == '' && $r->relationship_status == ''){
            $relationship->relationship_code = $r->relationship_code;
        }
        else if($r->relationship_code == '' && $r->relationship_name !='' && $r->relationship_status == ''){
            $relationship->name = $r->relationship_name;
        }
        else if($r->relationship_code == '' && $r->relationship_name =='' && $r->relationship_status != ''){
            $relationship->status = $r->relationship_status;
        }
        $relationship->save();
        Session::flash('success','Relationship updated successfully.');
        return back();
    }
}
