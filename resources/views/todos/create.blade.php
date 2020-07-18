@extends('layout')

@section('content')

<h1>Whats TO DO</h1>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">

                

                @if($errors->any())
                @foreach($errors->all() as $error)
                <p class="alert-danger">{{$error}}</p>
                @endforeach
                @endif

                @if(Session::has('msg'))

                <p class="alert-success">{{Session::get('msg')}}</p>

                @endif


                @if(Session::has('err'))

                <p class="alert-danger">{{Session::get('err')}}</p>

                @endif
                <form action="/todos/create" method="POST">
                    @csrf
                    <div class="form-group">
                        
                      <p>  <input type="text" placeholder="Enter Tile" name="title" class="form-control" id="name">
                      <br><button type="submit" class="btn btn-primary">Create</button>
                      </p>
                    </div>
                    <br>
                    <a href="/todos" class="btn btn-primary">back</class=></a>


                    
                </form>

             
            </div>
        </div>
    </div>
</div>

    @endsection