@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Create Post</h2>
    <form action="{{ route('post.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create post</button>
    </form>
    </div>
@endsection