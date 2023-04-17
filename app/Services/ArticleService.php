<?php

namespace App\Services;

use App\Contracts\ArticleInterface;

class ArticleService implements ArticleInterface
{
    protected $articleInterface;

    public function __construct(ArticleInterface $articleInterface)
    {
        $this->articleInterface = $articleInterface;
    }

    public function store(array $data)
    {
        return $this->articleInterface->store($data);
    }

    public function getById(int $id)
    {
        return $this->articleInterface->getById($id);
    }

    public function getAll()
    {
        return $this->articleInterface->getAll();
    }

    public function update(int $id, array $data)
    {
        return $this->articleInterface->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->articleInterface->delete($id);
    }
}
