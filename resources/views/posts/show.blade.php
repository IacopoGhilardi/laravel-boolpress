<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <h4>{{ $post->subtitle }}</h4>

    <article>{{ $post->text }}</article>
    <small>{{ $post->author }}</small>
    <small>{{ $post->publication_date }}</small>
    <p>POST STATUS: {{ $post->infoPost->post_status }}</p>
    <p>COMMENT STATUS: {{ $post->infoPost->comment_status }}</p>

    <h2>Comments</h2>
    @foreach ($post->comments as $comment)
        <p>{{ $comment->author }}</p>
        <p>{{ $comment->text }}</p>
    @endforeach
</body>
</html>