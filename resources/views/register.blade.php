@extends('layout')

@section('content')

<h1>Register here</h1>
<div class="row" >
    <div class="col-sm-6">
        <div class="card" > 
            <div class="card-body">

                <form action="registersubmit" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="name" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password"class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>    
            </div>
        </div>
    </div>

    @endsection