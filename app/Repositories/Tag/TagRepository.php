<?php

namespace App\Repositories\Tag;

interface TagRepository
{
    public function getAllTag();
    public function getAllTagPaginate();
    public function store($params): void;
    public function updateById($params , $id): void;
    public function destroyById($id): void;
}
