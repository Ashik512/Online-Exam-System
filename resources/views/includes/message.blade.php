@if(Session::has('success'))

     {{-- <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{Session('success')}}
    </div> --}}

    {{-- <script>
        Swal.fire(
       'The Internet?',
       'That thing is still around?',
        'question'
       )
    </script> --}}
    <script>
        toastr.success("{!! Session::get('success')  !!}");
    </script>

@endif

@if(Session('warning'))
     <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{Session('warning')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <a href="#" class="close" data-dismiss="alert">×</a>
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif