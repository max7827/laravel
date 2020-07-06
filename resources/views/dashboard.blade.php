@extends('layout')

@section('content')
<h1>kalli billi yo</h1>




<form action="upload" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="files" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@if(Session::has('msg'))

<p class="alert-success">{{Session::get('msg')}}</p>

@endif

@if(Session::has('err'))

<p class="alert-danger">{{Session::get('err')}}</p>

@endif
<hr>
<h1>File List</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Sr.No</th>
            <th scope="col">File Name</th>
            <th scope="col">Image</th>

        </tr>
    </thead>
    <tbody>
        @php $sr=1; @endphp
        @foreach($data as $d)
        
        <tr>
            <th scope="row">{{$sr++}}</th>
            <td>{{$d->file_name}}</td>



            <td>
                @if($d->extn!='mp3' )

                <img src="files/{{$d->file_name}}" width="100px">
                <a href="/download/{{$d->file_name}}">Download</a>



                @else
                <audio controls>
                    <source src="files/{{$d->file_name}}" type="audio/ogg">
                    <source src="files/{{$d->file_name}}" type="audio/mpeg">
                </audio>
                <a href="/download/{{$d->file_name}}">Download</a>

                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
</table>





@endsection