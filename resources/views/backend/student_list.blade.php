@extends('backend.adminmaster')

@section('content')

<div class="row justify-content-around">
	<div class="col-md-10 ">

<div class="card">

            <div class="card-header bg-primary">
              <h3 class="card-title">Student List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL No</th>
                  <th>Student Name</th>
                  <th>Student Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                @php
                 $i=1;
                @endphp
                
                @foreach($students as $student)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$student->name}}</td>
                  <td>{{$student->email}}</td>
                 
                  <td>
                    @if($student->status == '0')
                    <a href="{{route('enable-student',$student->id)}}" class="btn btn-primary btn-sm mr-1">Enable</a>
                    @else
                      <a href="{{route('disable-student',$student->id)}}" class="btn btn-dark btn-sm mr-1">Disable</a>
                    @endif
                    
                  </td>
                  

                </tr>
                @endforeach

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>

      </div>
       

@endsection