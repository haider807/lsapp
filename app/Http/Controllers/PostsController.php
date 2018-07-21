<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ];
        $this->validate($request, $rules);
        // Handle file upload
        if($request->hasFile('cover_image')){
            //How to get file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                                                                
            //Get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME); 
            //Get just file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        return redirect('/posts')->with('success','Post Created!');
        
        
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
        $post = Post::find($id);
        //$post = Post::orderBy('title','desc')->get()->paginate(1);
        //$post = Post::orderBy('title','desc')->get();
        return view('posts.show')->with('post' , $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','you are not authrosied');
        }
        return view('posts.edit')->with('post' , $post);
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
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ];
        $this->validate($request, $rules);
        if($request->hasFile('cover_image')){
            //How to get file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                                                                
            //Get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME); 
            //Get just file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }
        
        //Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        return redirect('/posts')->with('success','Post Updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','you are not authrosied');
        }
        
        if($post->cover_image != 'noimage.jpg')
        {
            //Delete image
            Storage::delete('public/cover_image/'.$post->cover_image);
        }
        return redirect('/posts')->with('success','Post Removed!');
    }
}
