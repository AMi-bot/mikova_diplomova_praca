<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PagesController extends Controller
{
    public function index(){
        return view('pages/welcome')
            ->with('posts',Post::orderBy('created_at','DESC')->paginate(5));
    }

    public function getAbout(){
        return view('pages/about');
    }
}
