@extends('layout.main')

@section('header')
    <div class="container text-center mt-5 mb-4">
        <h1>Blog</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <ul class="d-flex flex-wrap align-items-stretch">
            @foreach ($posts as $post)
                <li class="card m-2" style="width: calc(100% / 3 - 20px);">
                    <div class="card-body">
                        <h3>Titolo: {{ $post->title }}</h3>
                        <p>{{ $post->subtitle }}</p>
                        <small>{{ $post->author }}</small>
                        <a href="{{ route('posts.show', $post) }}">vedi dettagli</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <a class="btn btn-primary" href="{{ route('posts.create') }}">Inserisci il tuo articolo</a>
    </div>
@endsection