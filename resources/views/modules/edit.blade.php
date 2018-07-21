 @extends('layouts.app')

@section('content')
    <h1>Edit Module</h1>
    {!! Form::open(['action' => ['ModulesController@update',$module->id] , 'method' => 'PUT']) !!}
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$module->name,['class'=>'form-control','placeholder' => 'Name'])}}
    </div>
    
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::textarea('description',$module->description,['id'=>'article-ckeditor' , 'class'=>'form-control','placeholder' => 'Description Text'])}}
    </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection