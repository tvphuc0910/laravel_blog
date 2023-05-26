<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;

class PostController extends Controller
{
    private $postService;
    private $categoryService;
    private $tagService;

    public function __construct(PostService $postService, CategoryService $categoryService, TagService $tagService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    public function index()
    {
        $viewData = [
            'posts' => $this->postService->index(),
        ];

        return view('admin.post.index')->with($viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = [
            'categories' => $this->categoryService->getAllCategory(),
            'tags' => $this->tagService->getAllTag(),
        ];

        return view('admin.post.create')->with($viewData);

//        $tags = Tag::query()->get();
//        $categories = Category::query()->get();
//        return view('admin.post.create', [
//            'categories' => $categories,
//            'tags' => $tags,
//        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $this->postService->store($request);
//        if ($request->hasFile('photo')){
//            $path = Storage::disk('public')->putFile('photo', $request->file('photo'));
//            $arr = $request->validated();
//            $arr['photo'] = $path;
//        }
//        else {
//            $arr = $request->validated();
//        }
//        $this->model->create($arr)->tag()->attach($request->tag);

        return redirect()->route('posts.index')->with('message', 'Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $viewData = [
            'categories' => $this->categoryService->getAllCategory(),
            'tags' => $this->tagService->getAllTag(),
            'post' => $post,
        ];

        return view('admin.post.edit')->with($viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $post)
    {
        $this->postService->update($request, $post);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyPostRequest $request, $post)
    {
        $this->postService->destroy($post);

        return redirect()->route('posts.index');
    }
}
