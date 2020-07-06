@extends('layout')

@section('content')
<h1>Login here</h1>
<div class="row" >
    <div class="col-sm-6">
        <div class="card" > 
            <div class="card-body">

                @if(Session::has('err'))

                 <p class="alert-danger">{{Session::get('err')}}</p>

                @endif

              

                <form action="/loginsubmit" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" float="left">Email address</label>
                        <input type="email" name="email" class="form-control" value="" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        @error('email')
                        <p class="alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password"class="form-control" id="exampleInputPassword1">
                        @error('password')
                        <p class="alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>   

            </div>
        </div>
    </div>
</div>
    @endsection