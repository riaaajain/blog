@extends('layouts.app')

@section('content')

<div class="container">
    <h2>My Posts</h2>

    @foreach($posts as $post)
    <div class="card mt-3">
        <div class="card-header">
            <h4>{{ $post->title}}</h4>
        </div>
        <div class="card-body">
            <p class="card-text"> {{$post->desc}} </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('post.edit', [$post->id])}}"><button type="button" class="btn btn-dark">Edit</button></a>
            <a href="{{ route('post.delete', [$post->id])}}"><button type="button" class="btn btn-danger">Delete</button></a> 
        </div>
    </div>
    @endforeach
</div>


@endsection