@extends('layout')

@section('content')

<h1>Yours file here</h1>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">


                @if(Session::has('msg'))

                <p class="alert-success">{{Session::get('msg')}}</p>

                @endif


                @if(Session::has('err'))

                <p class="alert-danger">{{Session::get('err')}}</p>

                @endif
                <br>
                <a href="{{$url}}">Download file from here</a>
                <br><br>
                <a href="/todos/gofile" class="btn btn-primary">back</class=></a>





            </div>
        </div>
    </div>
</div>

@endsection