@extends('frontend.studentmaster')

@section('content')

<div class="">
          {{-- @php
          $name = Auth::user()->email
          @endphp --}}
          <form class="" action="{{route('view-result',$code)}}" method="post">
            @csrf

            <h3 class="text-uppercase text-center my-3 text-info">Test Your Knowledge </h3>
            <div class="row">
              <div class="col-md-4 col-lg-4">
                  <div class="text-center"><b>Name: {{Auth::user()->name}}</b></div>
              </div>
              <div class="col-md-4">
                  <div class="text-center"><b>Subject Name: {{$name->subject_name}}-{{$code}}</b></div>
              </div>
              <div class="col-md-4">
                  <div class="text-center"><b>Full Marks: {{$total_ques}}</b></div>
              </div>
            </div><hr>
          
           
            <div class="row">
            	<div class="col-md-10 ml-5">
            		@php $i=1 @endphp
            		@foreach($questions as $question)
	            		<h4>{{$i++}}. {{ $question->question }}</h4>

    	            		 <div class="">
                        <input type="radio" name="{{$question->id}}" value="1"> {{ $question->opt1 }}
                      </div>
	                     <div class="">
                        <input type="radio" name="{{$question->id}}" value="2"> {{ $question->opt2 }}</div>
    	            		 <div class="">
                        <input type="radio" name="{{$question->id}}" value="3"> {{ $question->opt3 }}
                      </div>
	                     <div class="mb-2">
                        <input type="radio" name="{{$question->id}}" value="4"> {{ $question->opt4 }}</div>
                    @endforeach
            	</div>

            </div>
            
           <div class="ml-4 my-3">
               <button type="submit" class="btn btn-primary">Submit</button>
           </div>
			
          </form>

        </div>


@endsection