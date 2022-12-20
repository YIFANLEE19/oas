<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationStatus;
use Illuminate\Http\Request;
use Session;

class ApplicationStatusController extends Controller
{
    //
    public function index()
    {
        $applicationStatuses = ApplicationStatus::all();
        return view('oas.superadmin.applicationStatus.home', compact('applicationStatuses'));
    }
    /**
     * create new address type function
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
    /**
     * update address type function
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
