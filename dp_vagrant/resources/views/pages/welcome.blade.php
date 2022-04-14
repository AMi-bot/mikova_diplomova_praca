@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('message'))
                    <p>
                        {{session()->get('message')}}
                    </p>
                @endif
                @foreach($posts as $post)
                    <div class="post pb-5">
                        <h2>{{$post->title}}</h2>
                        <span style="font-size: smaller">
                            {{$post->user->name}}
                            , {{date('jS M Y', strtotime($post->created_at))}}
                        </span>
                        <hr>
                        <p class="pb-1">{{$post->summary}}</p>
                        <div class="row justify-content-end">
                            @if(isset(Auth::user()->id) && Auth::user()->id == $post->author)
                                <div class="col-8">
                                    <a href="/post/{{$post->slug}}/edit" class="btn btn-outline-primary float-end">Edit post</a>
                                </div>
                                <div class="col-2">
                                    <a href="/post/{{$post->slug}}/delete" class="btn btn-outline-primary float-end">Delete post</a>
                                </div>
                            @endif
                            <div class="col-2">
                                <a href="/post/{{$post->slug}}" class="btn btn-outline-primary float-end">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
