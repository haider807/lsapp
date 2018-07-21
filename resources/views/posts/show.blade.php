 @extends('layouts.app')

@section('content')
<?php //print_r($post);exit;?>
<a href="/lsapp/public/posts" class="btn btn-primary">Go Back</a>
    <h1>{{$post->title}}</h1>
                        <img width="150" class="float-left" src="{{ config('app.url') }}/storage/cover_image/{{$post->cover_image}}">
                              
    <div>{!!$post->body!!}</div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-primary float-left">Edit Post</a>
        <!--    <a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-danger">Delete Post</a>-->
            {!!Form::open(['action' => [ 'PostsController@destroy' , $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection