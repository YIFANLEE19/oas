<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\AccStatus;
use Illuminate\Http\Request;
use Session;

class AccStatusController extends Controller
{
    //
    public function index()
    {
        $accStatuses = AccStatus::all();
        return view('oas.superadmin.accStatus.home', compact('accStatuses'));
    }
    /**
     * create new account status function
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
    /**
     * update account status function
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
