@extends('layout')

@section('content')
    <h1>kalli billi yo</h1>




    <form action="upload" method="POST" enctype="multipart/form-data">
    @csrf    

    <!-- <div class="form-group">
                        <label for="exampleInputEmail1" float="left">Email address</label>
                        <input type="imput" name="name" class="form-control" value="" id="exampleInputEmail1" aria-describedby="emailHelp">
                       
                    </div> -->
    <div class="form-group">
            <div class="custom-file">
                <input type="file" name="files"class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    

@endsection