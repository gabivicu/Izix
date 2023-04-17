<?php

namespace App\Services;

use App\Contracts\CommentInterface;

class CommentService implements CommentInterface
{
    protected $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function store(array $data)
    {
        return $this->commentInterface->store($data);
    }

    public function getById(int $id)
    {
        return $this->commentInterface->getById($id);
    }

    public function getAll()
    {
        return $this->commentInterface->getAll();
    }

    public function update(int $id, array $data)
    {
        return $this->commentInterface->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->commentInterface->delete($id);
    }

    public function deletedComments(array $data)
    {
        return $this->commentInterface->store($data);
    }

}
