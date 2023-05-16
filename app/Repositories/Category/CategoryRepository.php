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
    public function store($request):void;
    public function getListForGuest();
    public function getListForAdmin();
    public function showPostsByCategory($category);
    public function update($request, $category):void;
}
