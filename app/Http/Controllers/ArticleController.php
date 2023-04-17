<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $articles = $this->articleService->getAll();
        return view('articles', ['articles' => $articles]);
    }

    public function store(Request $request)
    {
        $request->validate(Article::$rules);

        $title = $request->input('title');
        $author = $request->input('author');
        $content = $request->input('content');

        $article = $this->articleService->store([
            'title' => $title,
            'author' => $author,
            'content' => $content,
        ]);

        return redirect()->route('articles.index');
    }

    public function show($id)
    {
        $article = $this->articleService->getById($id);
        $comments = $article->comments;
        $user_id = User::first();
 

        return view('article', [
            'article' => $article,
            'comments' => $comments,
            'user' => $user_id
            ]);
    }

    public function update(Request $request, $id)
    {
        $article = $this->articleService->update($id, $request->all());

        return response()->json($article);
    }

    public function destroy($id)
    {
        $this->articleService->delete($id);
        
    }

}
