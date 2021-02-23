<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Session;

class SubjectController extends Controller
{
    public function add_subject()
    {
    	return view('backend.subject');
    }
    

	public function save_subject(Request $request)
	{

		$request->validate([
          'subject_name' => 'required|unique:subjects|max:20',
          'subject_code' => 'required|unique:subjects|max:20',
      ]);

       $subject = new Subject();
       $subject->subject_code = $request->subject_code;
       $subject->subject_name = $request->subject_name;
       $subject->save();

       Session::flash('success','Subject added Successfully');
       return redirect()->back();
	}

	 public function SubjectList()
    {
    	$subjects = Subject::all();
    	return view('backend.subject_list',compact('subjects'));
    }

    public function EditSubject($id)
    {
        $subject   = Subject::find($id);
        //return $subject;
        return view('backend.edit_subject',compact('subject'));
    }
    
    public function updateSubject(Request $request,$id)
     {
      
      $subject             = Subject::find($id);

      if($request->subject_name == $subject->subject_name ){
       $request->validate([
          'subject_name' => 'required|unique:subjects|max:20',
          'subject_code' => 'required|unique:subjects|max:20',
      ]);
     }
        

        $subject->subject_code = $request->subject_code;
        $subject->subject_name = $request->subject_name;
        $subject->save();

       Session::flash('success','Subject updated Successfully');
       return back();
   }

   public function DeleteSubject($id)
    {
     
        //$id             =base64_decode($id);
        $subject          = Subject::find($id);
        $subject->delete();    
        Session::flash('success','Subject delete Success');
        return back();
    }

}
