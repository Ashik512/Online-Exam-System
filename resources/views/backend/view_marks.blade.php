@extends('backend.adminmaster')

@section('content')

<div class="row justify-content-around">
	<div class="col-md-10 ">

<div class="card">

            <div class="card-header bg-primary">
              <h3 class="card-title">Mark List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL No</th>
                  <th>Student Email</th>
                  <th>Student Code</th>
                  <th>Subject Name</th>
                  <th>Marks</th>
                </tr>
                </thead>
                <tbody>
                
                @php
                 $i=1;
                @endphp
                
                @foreach($marks as $mark)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$mark->email}}</td>
                  <td>{{$mark->subject_code}}</td>
                  <td>{{$mark->subject_name}}</td>
                  <td>{{$mark->marks}}</td>
              
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