<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use Session;
use DB;

class QuestionController extends Controller
{
    public function AddQuestion()
    {
    
    	$subjects = Subject::all();
    	return view('backend.add_question',compact('subjects'));
    }

    public function SaveQuestion(Request $request)
    {
    	//return $request;
       $request->validate([
          'subject_code' => 'required',
          'question' => 'required',
          'opt1'     => 'required',
          'opt2'     => 'required',
          'opt3'     => 'required',
          'opt4'     => 'required',
          'ans'     => 'required',
      ]);

       $question = new Question();
       $question->subject_code = $request->subject_code;
       $question->question = $request->question;
       $question->opt1 = $request->opt1;
       $question->opt2 = $request->opt2;
       $question->opt3 = $request->opt3;
       $question->opt4 = $request->opt4;
       $question->ans = $request->ans;
       $question->save();

       Session::flash('success','Question added Successfully');
       return back();
    }

    public function ViewQuestion()
    {
    	/*$questions = DB::table('questions')
    	->leftjoin('subjects','questions.subject_code','subjects.subject_code')
    	->select('questions.*','subjects.subject_name')
    	->get();*/
    	
      $questions = Question::all(); 
    	return view('backend.view_question',compact('questions'));
    }

    public function EditQuestion($id)
    {
    	$subjects = Subject::all();
        $question   = Question::find($id);
        //return $subject;
        return view('backend.edit_question',compact('question','subjects'));
    }


    public function UpdateQuestion(Request $request,$id)
    {
    	//return $request;

    	$question = Question::find($id);

       $request->validate([
          'subject_code' => 'required',
          'question' => 'required',
          'opt1'     => 'required',
          'opt2'     => 'required',
          'opt3'     => 'required',
          'opt4'     => 'required',
          'ans'     => 'required',
      ]);

      
       $question->subject_code = $request->subject_code;
       $question->question = $request->question;
       $question->opt1 = $request->opt1;
       $question->opt2 = $request->opt2;
       $question->opt3 = $request->opt3;
       $question->opt4 = $request->opt4;
       $question->ans = $request->ans;
       $question->save();

       Session::flash('success','Question updated Successfully');
       return back();
    }

    public function DeleteQuestion($id)
    {
     
        //$id             =base64_decode($id);
        $question = Question::find($id);
        $question->delete();    
        Session::flash('success','Question delete Success');
        return back();
    }
}
