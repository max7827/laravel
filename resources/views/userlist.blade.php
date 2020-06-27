@extends('layout')

@section('content')

<h1>User List</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Sr.No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody>
        @php $sr=1;  @endphp
        @foreach($data as $d)
            
                <tr>
                    <th scope="row">{{$sr++}}</th>
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->password}}</td>
                </tr>
        @endforeach
        
    </tbody>
</table>
@endsection