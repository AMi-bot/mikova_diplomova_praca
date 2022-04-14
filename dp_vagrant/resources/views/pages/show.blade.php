@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="row">
                    @if(isset(Auth::user()->id) && Auth::user()->id == $post->author)
                        <div class="col-10">
                            <a href="/post/{{$post->slug}}/edit" class="btn btn-outline-primary btn-sm float-end">Edit post</a>
                        </div>
                        <div class="col-2">
                            <a href="/post/{{$post->slug}}/delete" class="btn btn-outline-primary btn-sm float-end">Delete post</a>
                        </div>
                    @endif
                </div>
                <h1 class="text-center">{{$post->title}}</h1>
                <span style="font-size: smaller">
                    {{$post->user->name}}
                    , {{date('jS M Y', strtotime($post->created_at))}}
                </span>
                <hr>
                <p>{{$post->text}}</p>
            </div>
        </div>
    </div>
@endsection
