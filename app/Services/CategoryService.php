<?php

namespace App\Services;

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
    public function store(Request $request)
    {
        $this->categoryRepository->store($request->validated());
    }

    public function update(Request $request, $category)
    {
        $this->categoryRepository->update($request, $category);
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
            throw new Exception('Category dang co post');
        }
        $this->categoryRepository->destroyById($categoryId);
    }
}

