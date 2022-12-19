<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Race;
use Illuminate\Http\Request;
use Session;

class RaceController extends Controller
{
    //
    public function index()
    {
        $races = Race::all();
        return view('oas.superadmin.race.home', compact('races'));
    }
    /**
     * create new race function
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
    /**
     * update race function
     */
    public function update()
    {
        $r = request();
        $race = Race::find($r->id);
        if($r->race_code != '' && $r->race_name != '' && $r->race_status != ''){
            $race->race_code = $r->race_code;
            $race->name = $r->race_name;
            $race->status = $r->race_status;
        }
        else if($r->race_code != '' && $r->race_name != '' && $r->race_status == ''){
            $race->race_code = $r->race_code;
            $race->name = $r->race_name;
        }
        else if($r->race_code == '' && $r->race_name != '' && $r->race_status != ''){
            $race->name = $r->race_name;
            $race->status = $r->race_status;
        }
        else if($r->race_code != '' && $r->race_name == '' && $r->race_status != ''){
            $race->race_code = $r->race_code;
            $race->status = $r->race_status;
        }
        else if($r->race_code != '' && $r->race_name == '' && $r->race_status == ''){
            $race->race_code = $r->race_code;
        }
        else if($r->race_code == '' && $r->race_name !='' && $r->race_status == ''){
            $race->name = $r->race_name;
        }
        else if($r->race_code == '' && $r->race_name =='' && $r->race_status != ''){
            $race->status = $r->race_status;
        }
        $race->save();
        Session::flash('success','Race updated successfully.');
        return back();
    }
}
