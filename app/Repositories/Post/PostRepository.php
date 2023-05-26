<?php

namespace App\Repositories\Post;

interface PostRepository
{
    public function getListPaginate($limit);
    public function findOneBySlug($slug);
    public function getListSuggestedPost($category, $id);
    public function countByCategoryId($id);
    public function store($params): void;
    public function update($post): void;
    public function destroyById($id): void;
}
