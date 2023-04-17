<?php

namespace App\Repositories;

use App\Contracts\CommentInterface;
use App\Models\Comment;

class CommentRepository implements CommentInterface
{
    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        return Comment::create($data);
    }

    public function getById(int $id)
    {
        return Comment::findOrFail($id);
    }

    public function getAll()
    {
        return Comment::all();
    }

    public function update(int $id, array $data)
    {
        $comment = Comment::findOrFail($id);

        $comment->update($data);

        return $comment;
    }

    public function delete(int $id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();
    }

    public function deletedComments(array $data)
    {
        return Comment::create($data);
    }
}
