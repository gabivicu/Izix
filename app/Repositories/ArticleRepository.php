<?php

namespace App\Repositories;

use App\Contracts\ArticleInterface;
use App\Models\Article;

class ArticleRepository implements ArticleInterface
{
    protected $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        return Article::create($data);
    }

    public function getById(int $id)
    {
        return Article::findOrFail($id);
    }

    public function getAll()
    {
        return Article::all();
    }

    public function update(int $id, array $data)
    {
        $article = Article::findOrFail($id);

        $article->update($data);

        return $article;
    }

    public function delete(int $id)
    {
        $article = Article::findOrFail($id);

        $article->delete();
    }
}
