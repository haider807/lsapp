<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = "Welcome to Laravel Project";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);
    }
    public function about()
    {
        $title = "About us";
        return view('pages.about')->with('title',$title);
    }
    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ["Web dev","QA","HR","Support Engineer"]
        );
        return view('pages.services')->with($data);
    }
}
