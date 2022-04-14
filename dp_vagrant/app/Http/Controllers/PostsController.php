<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['index', 'show']]);
    }

    public function create(){
        return view('pages.create');
    }

    public function store(Request $request){
        $request->validate(['title' => 'required',
            'summary' => 'required',
            'text' => 'required']);

        $post = new Post();
        $post->title = $request->input('title');
        $post->summary = $request->input('summary');
        $post->text = $request->input('text');
        $post->slug = SlugService::createSlug(Post::class, 'slug',$request->input('title'));;
        $post->author = auth()->user()->id;
        $post->created_at= new DateTime();
        $post-> updated_at= new DateTime();

        $post->save();

        return redirect('/')->with('message', 'Post submitted successfully.');
    }

    public function show ($slug){
        if($slug) {
            return view('pages.show')->with('post', Post::where('slug', $slug)->first());
        }
    }

    public function edit($slug){
        if($slug) {
            return view('pages.edit')->with('post', Post::where('slug', $slug)->first());
        }
    }

    public function update(Request $request, $slug){
        $request->validate(['title' => 'required',
            'summary' => 'required',
            'text' => 'required']);

        $post = Post::where('slug',$slug)->first();
        $post->title = $request->input('title');
        $post->summary = $request->input('summary');
        $post->text = $request->input('text');
        $post->slug = SlugService::createSlug(Post::class, 'slug',$request->input('title'));;
        $post->author = auth()->user()->id;
        $post-> updated_at= new DateTime();

        $post->update();

        return redirect('/')->with('message', 'Post updated successfully.');

    }

    public function delete($slug){
        $post = Post::where('slug',$slug)->first();

        $post->delete();

        return redirect('/')->with('message', 'Post deleted successfully.');
    }
}
