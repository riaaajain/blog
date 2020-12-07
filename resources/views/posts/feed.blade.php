@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Feed</h2>

    @foreach($posts as $post)
    <div class="card mt-3">
        <div class="card-header">
           <h4> {{ $post->title }} </h4>
        </div>
        <div class="card-body">
            <p class="card-text"> {{$post->desc}} </p>
        </div>
    </div>
    @endforeach
</div>


@endsection