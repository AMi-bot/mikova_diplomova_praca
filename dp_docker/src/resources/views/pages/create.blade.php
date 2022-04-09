@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <h1 class="text-center">Create post</h1>
                <form action="/create-post" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="text" name="title" placeholder="Title" class="full-width form-control" style="font-size: 20px; font-weight: bold">
                    </div>
                    <div class="row">
                        <textarea name="summary" placeholder="Write a short summary" class="full-width form-control " rows="5" style="resize: none"></textarea>
                    </div>
                    <div class="row">
                        <textarea name="text" placeholder="Write your post here..." class="full-width form-control" rows="15" style="resize: none"></textarea>
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
