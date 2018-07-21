@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>Application from scratch Application from scratch Application from scratch</p>
    <p><a href="/lsapp/public/login" class="btn btn-primary btn-lg">Login</a> <a href="/lsapp/public/register" class="btn btn-success btn-lg">Sign up</a></p>
</div>
@endsection