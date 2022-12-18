<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\StudentType;
use Illuminate\Http\Request;
use Session;

class StudentTypeController extends Controller
{
    //
    public function index()
    {
        $studentTypes = StudentType::all();
        return view('oas.superadmin.studentType.home', compact('studentTypes'));
    }
    /**
     * create new student type function
     */
    public function create()
    {
        $r = request();
        $createStudentType = StudentType::create([
            'name' => $r->student_type_name,
        ]);
        Session::flash('success','New student type created successfully.');
        return back();
    }
    /**
     * update student type function
     */
    public function update()
    {
        $r = request();
        $studentType = StudentType::find($r->id);
        if($r->student_type_name != ''){
            $studentType->name = $r->student_type_name;
            $studentType->status = $r->student_type_status;
        }else{
            $studentType->status = $r->student_type_status;
        }
        $studentType->save();
        Session::flash('success','Student type updated successfully');
        return back();
    }
}
