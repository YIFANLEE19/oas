<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;
use Session;

class IncomeController extends Controller
{
    //
    public function index()
    {
        $incomes = Income::all();
        return view('oas.superadmin.income.home', compact('incomes'));
    }
    /**
     * create new income range function
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
    /**
     * update income function
     */
    public function update()
    {
        $r = request();
        $income = Income::find($r->id);
        if($r->income_code != null && $r->income_range != null && $r->income_status != null){
            $income->income_code = $r->income_code;
            $income->range = $r->income_range;
            $income->status = $r->income_status;
        }
        else if($r->income_code != null && $r->income_range != null && $r->income_status == null){
            $income->income_code = $r->income_code;
            $income->range = $r->income_range;
        }
        else if($r->income_code == null && $r->income_range != null && $r->income_status != null){
            $income->range = $r->income_range;
            $income->status = $r->income_status;
        }
        else if($r->income_code != null && $r->income_range == null && $r->income_status != null){
            $income->income_code = $r->income_code;
            $income->status = $r->income_status;
        }
        else if($r->income_code != null && $r->income_range == null && $r->income_status == null){
            $income->income_code = $r->income_code;
        }
        else if($r->income_code == null && $r->income_range !=null && $r->income_status == null){
            $income->range = $r->income_range;
        }
        else if($r->income_code == null && $r->income_range ==null && $r->income_status != null){
            $income->status = $r->income_status;
        }
        $income->save();
        Session::flash('success','Income range updated successfully.');
        return back();
    }
}
