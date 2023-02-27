<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccStatus;
use Session;

class AccStatusController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $accStatuses = AccStatus::all();
        return view('oas.admin.accStatus.home', compact('accStatuses'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createAccStatus = AccStatus::create([
            'status' => $r->status_name,
        ]);
        Session::flash('success','New account status created successfully.');
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
        $accStatuses = AccStatus::find($r->id);
        $accStatuses->status = $r->status_name;
        $accStatuses->save();
        Session::flash('success','Account status updated successfully');
        return back();
    }
}
