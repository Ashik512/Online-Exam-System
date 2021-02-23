@extends('backend.adminmaster')

@section('content')

<div class="row justify-content-around ">
<div class="col-md-6 mt-4">

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header bg-primary">

                <h3 class="card-title">Edit Subject</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('update-subject',$subject->id)}}">
              	@csrf

                <div class="card-body">
                  <div class="form-group">
                    <label>Edit Subject Code</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$subject->subject_code}}" name="subject_code" placeholder="Suject Code">
                  </div>

                  <div class="form-group">
                    <label>Edit Subject</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$subject->subject_name}}" name="subject_name" placeholder="Suject Name">
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