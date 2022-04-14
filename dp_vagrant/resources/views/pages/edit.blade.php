@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <h1 class="text-center">Edit post</h1>
                <form action="/post/{{$post->slug}}/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="text" name="title" value="{{$post->title}}" class="full-width form-control" style="font-size: 20px; font-weight: bold">
                    </div>
                    <div class="row">
                        <textarea name="summary" class="full-width form-control" rows="5" style="resize: none">
                            {{$post->summary}}
                        </textarea>
                    </div>
                    <div class="row">
                        <textarea name="text" class="full-width form-control" rows="15" style="resize: none">
                            {{$post->text}}
                        </textarea>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-2">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
