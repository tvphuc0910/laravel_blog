<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\CategoryService;
use Exception;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function guestIndex()
    {
        $viewData = [
            'categories' => $this->categoryService->guestIndex(),
        ];
        return view('categories')->with($viewData);
    }

    public function index()
    {
        $viewData = [
            'categories' => $this->categoryService->index(),
        ];
        return view('admin.category.index')->with($viewData);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->store($request);

        toastr()->closeButton(true)->addSuccess('Thêm thành công !');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function guestShow(Category $category)
    {
        $viewData = [
            'posts' => $this->categoryService->guestShow($category),
        ];

        return view('blog')->with($viewData);
    }

    public function show(Category $category)
    {
        $viewData = [
            'posts' => $this->categoryService->show($category),
        ];

        return view('admin.category.show')->with($viewData);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $category)
    {
        $this->categoryService->update($request, $category);

        toastr()->closeButton(true)->addSuccess('Cập nhật thành công !');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyCategoryRequest $request, $category)
    {
        try {
            $this->categoryService->destroy($category);
            toastr()->closeButton(true)->addSuccess('Xoá thành công !');
        } catch (Exception $e) {
            toastr()->closeButton(true)->addError($e->getMessage());
//            return redirect()->back();
        }

//        return redirect()->route('categories.index');
    }
}
