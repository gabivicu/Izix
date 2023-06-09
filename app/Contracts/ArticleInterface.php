<?php

namespace App\Contracts;

interface ArticleInterface
{
    public function store(array $data);

    public function getById(int $id);

    public function getAll();

    public function update(int $id, array $data);

    public function delete(int $id);
}
