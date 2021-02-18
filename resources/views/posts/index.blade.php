<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div> 
        <h2>Tutti i post</h2>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <h3>Titolo: {{ $post->title }}</h3>
                    <p>{{ $post->subtitle }}</p>
                    <small>{{ $post->author }}</small>
                    <a href="{{ route('posts.show', $post) }}">vedi dettagli</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>