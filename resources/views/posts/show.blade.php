@extends('layout.main')

@section('header')
    <div class="container text-center mt-5 mb-4">
        <h1>{{ $post->title }}</h1>
        <h4>{{ $post->subtitle }}</h4>
    </div>
@endsection

@section('content')
    <div class="container">
        
        <article>{{ $post->text }}</article>
        <div class="d-flex justify-content-between mt-2">
            <small>{{ $post->author }}</small>
            <small>{{ $post->publication_date }}</small>
        </div>
        <p class="mt-3">POST STATUS: {{ $post->infoPost->post_status }}</p>
        <p>COMMENT STATUS: {{ $post->infoPost->comment_status }}</p>
        <h5>Comments:</h5>
        @foreach ($post->comments as $comment)
            <div class="card my-4 p-2">
                <span>{{ $comment->text }}</span>
                <span class="mt-2">{{ $comment->author }}</span>
            </div>
        @endforeach
    </div>
@endsection