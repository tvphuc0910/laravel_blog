<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyCategoryRequest;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new Category();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst',$arr);
        $title = implode(' - ', $arr);
        View::share('title', $title);
    }

    public function guestIndex()
    {
        $categories = Category::with('latestPost')->paginate(3);
        return view('categories',[
            'categories'=> $categories,
        ]);
    }

    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.category.index',[
            'categories' => $categories,
        ]);
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
        $this->model::create($request->validated());

        return redirect()->route('categories.index')->with('message', 'Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function guestShow(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        return view('blog',[
            'posts' => $posts,
        ]);
    }

    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        return view('admin.category.show',[
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',[
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
        $category = Category::find($category);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');


        $category->save();

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
        $category = Category::find($category);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
