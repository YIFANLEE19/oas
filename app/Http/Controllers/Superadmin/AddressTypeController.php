<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\AddressType;
use Illuminate\Http\Request;
use Session;

class AddressTypeController extends Controller
{
    //
    public function index()
    {
        $addressTypes = AddressType::all();
        return view('oas.superadmin.addressType.home', compact('addressTypes'));
    }
    /**
     * create new address type function
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
    /**
     * update address type function
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
