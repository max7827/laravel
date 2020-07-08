@extends('layout')

@section('content')

<h1>Yours TO DO</h1>
<br>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">





                <a class="btn btn-primary" href="/todos/create"><b>Create TO DO</b></a>
                <br>
                 <br>

                <table class="table table-bordered">

                  
                    @foreach($data as $d)

                    <tr>

                        <td> 
                            
                        <div>
                           
                        @if($d->completed == 0)    
                        <a href="{{'/todos/'.$d->id.'/completed'}}"><span class="fas fa-check text-grey-400 "> </span></a>
                        <span >{{$d->title}} </span>
                        @else
                        <span class="fas fa-check text-green-400 "> </span>
                        
                        <span class="line-through">{{$d->title}} </span>
                        @endif
                        &nbsp;&nbsp;&nbsp;
                       <a href="{{'/todos/'.$d->id.'/edit'}}"> <span class="fas fa-edit"></span></a>
                       &nbsp;&nbsp;&nbsp;<a href="{{'/todos/'.$d->id.'/delete'}}"> <span class="fas fa-trash-alt" ></span></a>
                       
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