@extends('backend.adminmaster')

@section('content')

<div class="row justify-content-around ">
<div class="col-md-6 mt-4">

{{-- @include('includes.message') --}}
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header bg-primary">

                <h3 class="card-title">Add Subject</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('save-subject')}}">
              	@csrf

                <div class="card-body">
                 
                  <div class="form-group">
                    <label>Subject Code</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="subject_code" placeholder="Suject Code">
                  </div>

                  <div class="form-group">
                    <label>Subject Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('subject_name')}}" name="subject_name" placeholder="Suject Name">
                  </div>
                  
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
            </div>

          </div>
      </div>


@endsection