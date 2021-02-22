@extends('layout.main')

@section('header')
    <h1>Modifica</h1>
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

            {{-- creo il form per aggiungere un articolo --}}
        <form action="{{ route('posts.update', $post )}}" method="post">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input class="form-control" type="text" name="subtitle" id="subtitle" placeholder="Subtitle" value="{{ $post->subtitle }}">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input class="form-control" type="text" name="author" placeholder="Author" value="{{ $post->author }}">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" name="text" id="text" placeholder="Text" rows="6">{{ $post->text }}</textarea>
            </div>
            <div class="form-group">
                <label for="post_status">Post Status</label>
                <select class="form-control" name="post_status" id="post_status">
                    <option value="public">public</option>
                    <option value="private">private</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment_status">Comment Status</label>
                <select class="form-control" name="comment_status" id="comment_status">
                    <option value="public">public</option>
                    <option value="private">private</option>
                    <option value="closed">closed</option>
                </select>
            </div>
            <h5>Tags</h5>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]" @if ($post->tags->contains($tag->id)) checked @endif>
                    <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
            <div class="buttons mt-5 d-flex justify-content-between">
                <input class="btn btn-primary" type="submit" value="Aggiorna">
                <a class="btn btn-danger" href="{{ route('posts.index') }}">Indietro</a>
            </div>
        </form>   
    </div> 
@endsection