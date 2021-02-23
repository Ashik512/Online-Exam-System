@extends('backend.adminmaster')

@section('content')

<div class="row justify-content-around">
	<div class="col-md-10 ">

<div class="card">

            <div class="card-header bg-primary">
              <h3 class="card-title">Subject List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL No</th>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                @php
                 $i=1;
                @endphp
                
                @foreach($subjects as $subject)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$subject->subject_code}}</td>
                  <td>{{$subject->subject_name}}</td>
                 
                  <td>
                    <a href="{{route('edit-subject',$subject->id)}}" class="btn btn-primary btn-sm mr-1">Edit</a>
                    <a href="{{route('delete-subject',$subject->id)}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-sm">Delete</a>
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