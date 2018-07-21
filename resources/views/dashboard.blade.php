@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/lsapp/public/posts/create" class="btn btn-primary">Create Post</a><br>
                    <h3>Your Blog Posts are:</h3>
                    @if(count($posts))
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="{{ config('app.url') }}/posts/{{$post->id}}/edit" class="btn btn-primary ">Edit</a></td>
                            <td>{!!Form::open(['action' => [ 'PostsController@destroy' , $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h3>You have no posts</h3>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
