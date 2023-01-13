<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Session;

class CountryController extends Controller
{
    //
    public function index()
    {
        $countries = Country::all();
        return view('oas.superadmin.country.home', compact('countries'));
    }
    /**
     * create new country function
     */
    public function create()
    {
        $r = request();
        $createcountry = Country::create([
            'country_code' => $r->country_code,
            'name' => $r->country_name,
        ]);
        Session::flash('success','New country created successfully.');
        return back();
    }
    /**
     * update country function
     */
    public function update()
    {
        $r = request();
        $country = Country::find($r->id);
        ($r->country_code != '') ? $country->country_code = $r->country_code : '';
        ($r->country_name != '') ? $country->name = $r->country_name : '';
        ($r->country_status != '') ? $country->status = $r->country_status : '';
        $country->save();
        Session::flash('success','country updated successfully.');
        return back();
    }
}
