 @extends('layouts.app')

@section('content')
    <?php //echo "<pre/>";print_r($modules);exit;?>
    <h1>Modules</h1>
    @if(count($modules))
        @foreach($modules as $module)
        
        <div class="col-md-12 mb-5">
            <div class="card text-white bg-secondary">
                
                <div class="card-header"><a href="/lsapp/public/modules/{{$module->id}}">{{$module->name}}</a></div>
                <div class="card-body row">
                    
                    <div class="col-md-9 col-sm-9">
                        {!!$module->description!!}<br>
                        <small>Written on {{$module->created_at}}</small>
                    </div>
                </div>
            </div>  
        </div>
        
        @endforeach
    @else
    <p>No module is found</p>
    @endif
@endsection



                