@extends('layout')

@section('content')

<h1>Upload files to server</h1>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">

                


             


                @if(Session::has('err'))

                <p class="alert-danger">{{Session::get('err')}}</p>

                @endif
              
                <form action="/todos/gofile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        
                     
                       
                        <p>  <input type="file"  name="files" class="form-control" id="name">
                      <br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                      </p>
                    </div>
                  


                    
                </form>

             
            </div>
        </div>
    </div>
</div>

    @endsection