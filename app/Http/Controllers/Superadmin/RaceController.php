<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Race;
use Illuminate\Http\Request;
use Session;

class RaceController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $races = Race::all();
        return view('oas.superadmin.race.home', compact('races'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createRace = Race::create([
            'race_code' => $r->race_code,
            'name' => $r->race_name,
        ]);
        Session::flash('success','New race created successfully.');
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
        $race = Race::find($r->id);
        ($r->race_code != null) ? $race->race_code = $r->race_code :'';
        ($r->race_name != null) ? $race->name = $r->race_name :'';
        ($r->race_status != null) ? $race->status = $r->race_status :'';
        $race->save();
        Session::flash('success','Race updated successfully.');
        return back();
    }
}
