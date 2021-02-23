<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Mistake;
use App\Models\User;
use App\Models\Mark;
use Session;

class StudentController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    public function Dashboard()
    {
      $count = $this->count();
      
    	return view('frontend.studentmaster',compact('count'));
    }

    public function GiveExamForm()
    {

        $count = $this->count();
        $subjects = Subject::all();
        return view('frontend.give_exam_form',compact('subjects','count'));
    }

    public function GiveExam($subject_code = null)
    {


      $count = $this->count();
      //return $subject_code;
      if($subject_code!=null){
        $code = $subject_code;
        $questions = Question::where('subject_code',$code)
        ->get();
        $total_ques = $questions->count();
        $name = Subject::where('subject_code',$code)
        ->select('subjects.subject_name')
        ->first();
        //return $name->subject_name;
       // return $questions;
        return view('frontend.give_exam',compact('questions','name','code','count','total_ques'));
    }
    else
    {
        return view('frontend.studentmaster',compact('count'));
    }
   
    }

    public function ViewResult(Request $request,$code)
    {
        
        $count = $this->count();
        $user = Auth::user()->email;
       
       $questions = Question::where('subject_code',$code)
        ->get();
       
        $marks = 0;
       foreach ($questions as $question) {
        //return $request->$question->id;
           if($question->ans == $request[$question->id]){
            $marks++;
        }
        else{
            
           $exists   = Mistake::where('question_id',$question->id)->first();
           if(!$exists){
           $mistake = new Mistake();

           //return $mistake;
           $mistake->question_id = $question->id;
           $mistake->email    = $user;
           $mistake->question = $question->question;
           $mistake->opt1     = $question->opt1;
           $mistake->opt2     = $question->opt2;
           $mistake->opt3     = $question->opt3;
           $mistake->opt4     = $question->opt4;
           $mistake->ans      = $question->ans;

           $mistake->save();
       }

        }
               
       }
     
        $subjects = Subject::where('subject_code',$code)
        ->first();
        $scores = new Mark();
        $scores->email = $user;
        $scores->subject_code = $subjects->subject_code;
        $scores->subject_name = $subjects->subject_name;
        $scores->marks = $marks;
        $scores->save();

      return view('frontend.view_score',compact('marks','code','count'));
   }
    

    public function ViewAns($code)
    {

        $count = $this->count();
        $questions = Question::where('subject_code',$code)
        ->get();
        $name = Subject::where('subject_code',$code)
        ->select('subjects.subject_name')
        ->first();
        //return $name->subject_name;
       // return $questions;
        return view('frontend.view_ans',compact('questions','name','code','count'));
    }

    public function Mistakes()
    {
       $user = Auth::user()->email;
       $mistakes = Mistake::where('email',$user)
       ->get();
       $count = $mistakes->count();
       return view('frontend.mistakes',compact('mistakes','count'));
    }

    public function ShowPofile()
    {
      $count    = $this->count();
      $email     = Auth::user()->email;
      $profile  = User::where('email',$email)
      ->first();
      return view('frontend.profile',compact('profile','count'));
    }


    public function UpdatePofile(Request $request,$email)
    {
      $count    = $this->count();
      $profile  = User::where('email',$email)
      ->first();

       $profile->name = $request->name;
        $profile->save();

      Session::flash('success','Pofile updated Successfully');
      return redirect()->back()->with('count', 'count'); 

    }

    public function ShowMarks()
    {
       $count  = $this->count();
       $email     = Auth::user()->email;
       $scores = Mark::where('email',$email)
       ->get();
       return view('frontend.mark_list',compact('scores','count'));
    }

    public function DeleteMistake($id)
    {
       $count   = $this->count();
       $mistake = Mistake::find($id);
       $mistake->delete();    
       Session::flash('success','Mistake deleted Successfully');
       return back()->with('count','count');
    }

    public function count()
    {
       $user = Auth::user()->email;
        $mistakes = Mistake::where('email',$user)
       ->get();
       $count = $mistakes->count();
       return $count;
    }
}
