@extends('layout.main')

@section('header')
    <div class="text-center my-5">
        <h1>Scrivi un nuovo articolo</h1>
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

        {{-- creo il form per aggiungere un articolo --}}
        <form action="{{ route('posts.store') }}" method="post">
            
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
            </div>
            <div>
                <label for="author">Author</label>
                <input class="form-control" type="text" name="author" placeholder="Author" value="{{ old('author') }}">
            </div>
            <div>
                <label for="text">Text</label>
                <textarea class="form-control" name="text" id="text" placeholder="Text" rows="6" value="{{ old('text') }}"></textarea>
            </div>
            <div class="buttons mt-5 d-flex justify-content-between">
                <input class="btn btn-primary" type="submit" value="Aggiungi">
                <a class="btn btn-danger" href="{{ route('posts.index') }}">Indietro</a>
            </div>
        </form>   
    </div> 
@endsection