 @extends('layouts.app')

@section('content')
<?php //print_r($post);exit;?>
<a href="/lsapp/public/machines" class="btn btn-primary">Go Back</a>
    <h1>{{$machine->title}}</h1>
                                 
    <div>{!!$machine->body!!}</div>
    <hr>
    <small>Written on {{$machine->created_at}}small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $machine->user_id)
            <a href="/lsapp/public/posts/{{$machine->id}}/edit" class="btn btn-primary float-left">Edit Post</a>
            {!!Form::open(['action' => [ 'PostsController@destroy' , $machine->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection