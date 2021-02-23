@extends('frontend.studentmaster')

@section('content')

<h1 class="text-center mt-4 "><span class="text-info">Your Score is :</span> {{$marks}}</h1>
<div class="row justify-content-center">
<a href="{{route('view-ans',$code)}}" class="btn btn-primary">View Answers</a>
</div>
@endsection