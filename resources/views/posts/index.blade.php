 @extends('layouts.app')

@section('content')
    <?php //echo "<pre/>";print_r($posts);exit;?>
    <h1>Posts</h1>
    @if(count($posts))
        @foreach($posts as $post)
        
        <div class="col-md-12 mb-5">
            <div class="card text-white bg-secondary">
                
                <div class="card-header"><a href="/lsapp/public/posts/{{$post->id}}">{{$post->title}}</a></div>
                <div class="card-body row">
                    <div class="col-md-3 col-sm-3">
                        <img width="150" class="float-left" src="storage/cover_image/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-9 col-sm-9">
                        {!!$post->body!!}<br>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>  
        </div>
        
        @endforeach
    @else
    <p>No post is found</p>
    @endif
@endsection



                