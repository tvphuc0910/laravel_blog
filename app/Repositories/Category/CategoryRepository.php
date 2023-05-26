<?php

namespace App\Repositories\Category;

interface CategoryRepository
{
    /**
     * XOa boi id
     *
     * @param $id
     * @return void
     */
    public function destroyById($id): void;
    public function getAllCategory();
    public function store($params):void;
    public function getListForGuest();
    public function getListForAdmin();
    public function showPostsByCategory($category);
    public function updateById($category):void;
}
