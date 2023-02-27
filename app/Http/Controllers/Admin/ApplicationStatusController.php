<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationStatus;
use Illuminate\Http\Request;
use Session;

class ApplicationStatusController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $applicationStatuses = ApplicationStatus::all();
        return view('oas.admin.applicationStatus.home', compact('applicationStatuses'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createApplicationStatus = ApplicationStatus::create([
            'status' => $r->status_name,
        ]);
        Session::flash('success','New application status created successfully.');
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
        $applicationStatus = ApplicationStatus::find($r->id);
        $applicationStatus->status = $r->status_name;
        $applicationStatus->save();
        Session::flash('success','Application status updated successfully');
        return back();
    }
}
