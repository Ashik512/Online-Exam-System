<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mark;
use Session;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        return view('backend.adminmaster');
    }

    public function ManageStudent()
    {
       $students = User::all();
       return view('backend.student_list',compact('students'));
    }
    
    public function EnableStudent($id)
    {
      $student = User::find($id);
       $student->status  = 1;
       $student->save();
        
       Session::flash('success','Student Enabled Success');
       return back();
    }

     public function DisableStudent($id)
    {
       $student = User::find($id);
       $student->status  = 0;
       $student->save();
        
       Session::flash('success','Student Disabled Success');
       return back();
    }

    public function ViewMarks()
    {
      $marks = Mark::all();
      return view('backend.view_marks',compact('marks'));
    }

}
