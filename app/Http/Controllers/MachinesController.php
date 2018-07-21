<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machine;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //List all machines
        $machines = Machine::orderBy('created_at','desc')->paginate(10);
        return view('machines.index')->with('machines',$machines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ];
        $this->validate($request, $rules);
        
        //Create Machine
        $machine = new Machine;
        $machine->name = $request->input('name');
        $machine->price = $request->input('price');
        $machine->description = $request->input('description');
        //$machine->user_id = auth()->user()->id;
        //$machine->cover_image = $fileNameToStore;
        $machine->save();
        
        return redirect('/machines')->with('success','Machines Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "$id";        //exit('testtt');
        $machine = Machine::find($id);
        //$post = Post::orderBy('title','desc')->get()->paginate(1);
        //$post = Post::orderBy('title','desc')->get();
        return view('machines.show')->with('machine' , $machine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
