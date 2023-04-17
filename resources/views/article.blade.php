<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $article->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/articles.css') }}" rel="stylesheet">
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <p><strong>Author:</strong> {{ $article->author }}</p>
        <p><strong>Content:</strong></p>
        <div>{{ $article->content }}</div>
    </div>

    <div class="container">
        <h2>Comments</h2>
        <ul>
            @foreach($article->comments as $comment)
                <li>
                    <p>{{ $comment->comment }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="container">
        <h2>Add a comment</h2>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div>
                <label for="content">Comment</label>
                <textarea name="content" id="content" data-user-id="{{ $user->id }}" cols="30" rows="5"></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
