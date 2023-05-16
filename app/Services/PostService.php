<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getListPaginate($limit = 10)
    {
        return Post::paginate($limit);
    }

    public function findOneBySlug($slug)
    {
        return Post::with('category')->where('slug', $slug)->first();
    }

    public function getListsuggestedPost($category, $id)
    {
        return Post::where('category_id', $category)->where('id', '!=', $id)->limit(3)->get();
    }

    public function countByCategoryId($id)
    {
        return Post::where('category_id', $id)->count();
    }

}
