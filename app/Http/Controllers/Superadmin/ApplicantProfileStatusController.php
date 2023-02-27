<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfileStatus;
use Illuminate\Http\Request;
use Session;

class ApplicantProfileStatusController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $applicantProfileStatuses = ApplicantProfileStatus::all();
        return view('oas.superadmin.applicantProfileStatus.home', compact('applicantProfileStatuses'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createApplicantProfileStatus = ApplicantProfileStatus::create([
            'status' => $r->status_name,
        ]);
        Session::flash('success','New applicant profile status created successfully.');
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
        $applicantProfileStatus = ApplicantProfileStatus::find($r->id);
        $applicantProfileStatus->status = $r->status_name;
        $applicantProfileStatus->save();
        Session::flash('success','Applicant profile status updated successfully');
        return back();
    }
}
