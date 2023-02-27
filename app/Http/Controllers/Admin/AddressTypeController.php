<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressType;
use Session;

class AddressTypeController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $addressTypes = AddressType::all();
        return view('oas.admin.addressType.home', compact('addressTypes'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createAddressType = AddressType::create([
            'type' => $r->type_name,
        ]);
        Session::flash('success','New address type created successfully.');
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
        $addressType = AddressType::find($r->id);
        $addressType->type = $r->type_name;
        $addressType->save();
        Session::flash('success','Address type updated successfully');
        return back();
    }
}
