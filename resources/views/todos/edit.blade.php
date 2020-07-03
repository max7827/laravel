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


                @foreach($data as $d)

               
                <form action="{{'/todos/'.$d->id.'/edit'}}" method="post">
                @method('patch')   
                @csrf
                    <div class="form-group">
                   
                      <p>  <input type="text" value="{{$d->title}}" name="title" class="form-control" id="name">
                        @endforeach
                      <button type="submit" class="btn btn-primary">Update</button>
                      </p>
                    </div>
                    <a href="/todos" class="btn btn-primary">back</class=></a>


                    
                </form>

             
            </div>
        </div>
    </div>
</div>

    @endsection