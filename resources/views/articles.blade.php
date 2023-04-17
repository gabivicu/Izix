<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/articles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>List Articles</h1>
        @foreach($articles as $article)
                <div>
                        <a href="{{ route('articles.show', $article->id) }}" target="_blank">{{ $article->title }}</a>
                </div>
        @endforeach
    </div>

    <div class="container">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <h1>Add New Article</h1>
            <div>
                <label for="title"></label>
                <input type="text" name="title" placeholder="Title">
            </div>
            <div>
                <label for="author"></label>
                <input type="text" name="author" placeholder="Author">
            </div>
            <div>
                <label for="content"></label>
                <textarea name="content" placeholder="Content" id="content" cols="30" rows="5"></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>

</body>
</html>
