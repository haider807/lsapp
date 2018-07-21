 @extends('layouts.app')

@section('content')
    <?php //echo "<pre/>";print_r($posts);exit;?>
    <h1>Machines</h1>
    @if(count($machines))
        @foreach($machines as $machine)
        
        <div class="col-md-12 mb-5">
            <div class="card text-white bg-secondary">
                
                <div class="card-header"><a href="/lsapp/public/machines/{{$machine->id}}">{{$machine->name}}</a></div>
                <div class="card-body row">

                    <div class="col-md-9 col-sm-9">
                        {!!$machine->description!!}<br>
                        <small>Written on {{$machine->created_at}}</small>
                    </div>
                </div>
            </div>  
        </div>
        
        @endforeach
    @else
    <p>No machine is found</p>
    @endif
@endsection



                