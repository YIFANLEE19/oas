<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;
use Session;

class IncomeController extends Controller
{
    /*
    |-----------------------------------------------------------
    | Return home page
    |-----------------------------------------------------------
    */
    public function index()
    {
        $incomes = Income::all();
        return view('oas.superadmin.income.home', compact('incomes'));
    }
    /*
    |-----------------------------------------------------------
    | Create function
    |-----------------------------------------------------------
    */
    public function create()
    {
        $r = request();
        $createIncomeRange = Income::create([
            'income_code' => $r->income_code,
            'range' => $r->income_range,
        ]);
        Session::flash('success','New income range created successfully.');
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
        $income = Income::find($r->id);
        ($r->income_code != null) ? $income->income_code = $r->income_code :'';
        ($r->income_range != null) ? $income->range = $r->income_range :'';
        ($r->income_status != null) ? $income->status = $r->income_status :'';
        $income->save();
        Session::flash('success','Income range updated successfully.');
        return back();
    }
}
