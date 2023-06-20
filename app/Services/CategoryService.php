<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Exception;
use Illuminate\Http\Request;

class CategoryService
{

    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly PostService $postService
    ) {
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->getAllCategory();
    }

    public function index()
    {
        return $this->categoryRepository->getListForAdmin();
    }

    public function guestIndex()
    {
        return $this->categoryRepository->getListForGuest();
    }

    public function guestShow($category)
    {
        return $this->categoryRepository->showPostsByCategory($category);
    }

    public function show($category)
    {
        return $this->categoryRepository->showPostsByCategory($category);
    }


    /**
     * @param  Request  $request
     * @return mixed
     */
    public function store(Request $params)
    {
        $this->categoryRepository->store($params->validated());
    }

    public function update(Request $params, $category)
    {
        $category = Category::find($category);
        $category->name = $params->input('name');
        $category->slug = $params->input('slug');

        $this->categoryRepository->updateById($category);
    }

    /**
     * Xoa du category bang id
     *
     * @param  int  $categoryId
     * @return void
     * @throws Exception
     */
    public function destroy(int $categoryId): void
    {
        $postCount = $this->postService->countByCategoryId($categoryId);
        if ($postCount) {
            throw new Exception('Thể loại đang có bài viết, không thể xoá !');
        }
        $this->categoryRepository->destroyById($categoryId);
    }
}

