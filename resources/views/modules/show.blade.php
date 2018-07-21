 @extends('layouts.app')

@section('content')
<?php // print_r($module);exit;?>
<a href="/lsapp/public/modules" class="btn btn-primary">Go Back</a>
    <h1>{{ $module->name }}</h1>       
    <div>{!!$module->description!!}</div>
    <hr>
    <small>Written on {{$module->created_at}}</small>
    <hr>
            <a href="/lsapp/public/modules/{{$module->id}}/edit" class="btn btn-primary float-left">Edit Module</a>
            {!!Form::open(['action' => [ 'ModulesController@destroy' , $module->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
@endsection