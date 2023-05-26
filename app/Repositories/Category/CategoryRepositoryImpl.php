<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\Post;

class CategoryRepositoryImpl implements CategoryRepository
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param $request
     * @return void
     */

    public function getAllCategory()
    {
        return Category::query()->get();
    }

    public function getListForAdmin()
    {
        return Category::paginate(5);

    }

    public function getListForGuest()
    {
        return Category::with('latestPost')->paginate(3);

    }

    public function showPostsByCategory($category)
    {
        return Post::where('category_id', $category->id)->paginate(3);
    }

    public function store($params): void
    {
        $this->category->create($params);
    }

    public function updateById($category): void
    {
        $category->save();
    }

    /**
     * @param $id
     * @inheritDoc
     */
    public function destroyById($id): void
    {
        $category = Category::find($id);
        $category->delete();
    }
}

