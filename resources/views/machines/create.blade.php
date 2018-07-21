 @extends('layouts.app')

@section('content')
    <h1>Add Machine</h1>
    {!! Form::open(['action' => 'MachinesController@store' , 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder' => 'Machine Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('price','Price')}}
        {{Form::text('price','',['class'=>'form-control','placeholder' => 'Machine Price'])}}
    </div>
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::textarea('description','',['id'=>'article-ckeditor' , 'class'=>'form-control','placeholder' => 'Machine Description'])}}
    </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection