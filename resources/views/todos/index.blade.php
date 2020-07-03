@extends('layout')

@section('content')

<h1>Yours TO DO</h1>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">





                <a href="/todos/create"><b>Create TO DO</b></a>
                <hr>

                <table class="table table-bordered">

                  
                    @foreach($data as $d)

                    <tr>

                        <td> <div><span class="fas fa-check text-green-300 cursor-pointer"> </span>{{$d->title}} 
                       <a href="{{'/todos/'.$d->id.'/edit'}}"> <span class="fas fa-edit"></span></a>
                       <a href="{{'/todos/'.$d->id.'/delete'}}"> <span class="fas fa-delete"></span></a>
                    </div>
                    </tr>
                    
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection