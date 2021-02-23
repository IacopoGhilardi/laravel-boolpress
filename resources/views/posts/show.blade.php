@extends('layout.main')

@section('header')
    <div class="container text-center mt-5 mb-4">
        <h1>{{ $post->title }}</h1>
        <h4>{{ $post->subtitle }}</h4>
    </div>
@endsection

@section('content')

    <div class="container">
            {{-- gestisco l'errore --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
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

        <form action="{{ route('posts.addComment', $post )}}" method="post">
            @csrf
            @method('POST')
            <h2>Commenta</h2>
            <div class="form-group">
                <label for="author">Author</label>
                <input class="form-control" type="text" name="author" placeholder="Author">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" name="text" id="text" placeholder="Text" rows="6"></textarea>
            </div>
            <div class="buttons my-2 d-flex justify-content-between">
                <input class="btn btn-primary" type="submit" value="Commenta">     
                <a class="btn btn-danger" href="{{ route('posts.index') }}">Indietro</a>
            </div>
        </form>
    </div>
@endsection