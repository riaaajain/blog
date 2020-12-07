@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Create Post</h2>
    <form action="{{ route('post.update',[$post->id]) }}" method="post">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $post->title}}" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ $post->desc }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update post</button>
    </form>
    </div> 
@endsection 