@extends('layout')

@section('content')
<br>
<h1>Whats TO DO</h1>
<br>
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


                @foreach($data as $d)
                @endforeach

                <form action="{{'/todos/'.$d->id.'/edit'}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">

                        <p> <input type="text" value="{{$d->title}}" name="title" class="form-control" id="name">


                            @if($d->completed==1)

                             <input type="checkbox" name="check" id="checked" value="{{$d->completed}}" checked>
                             <label for="checked">Completed</label>
                             

                            @endif


                            @if($d->completed==0)
                       
                            <br> <input type="checkbox" name="check" id="unchecked" value="{{$d->completed}}" >
                            <label for="checked">Completed</label>

                            @endif
                           
                            <br>
                        </p>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                  



                </form>


            </div>
        </div>
    </div>
</div>

@endsection