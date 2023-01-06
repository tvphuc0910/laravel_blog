<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new Post();
        $routeName = Route::currentRouteName() ;
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst',$arr);
        $title = implode(' - ', $arr);
        View::share('title', $title);
    }

    public function index()
    {
        $posts = Post::all();

        $categories = Category::query()->get();
        return view('admin.post.index',[
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.post.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $path = Storage::disk('public')->putFile('photo', $request->file('photo'));
        $arr = $request->validated();
        $arr['photo'] = $path;
        $this->model->create($arr);

        return redirect()->route('posts.index')->with('success', 'Thêm thành công !');
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
        $categories = Category::query()->get();
        return view('admin.post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $posts = Post::find($post);

        $posts->category_id = $request->input('category_id');
        $posts->title = $request->input('title');
        $posts->description = $request->input('description');
        $posts->content = $request->input('content');

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
                $extension = $request->photo->getClientOriginalExtension();
                $fileName = 'photo/' . uniqid().'.'.$extension;
                $file->move(public_path() . '/storage/photo', $fileName);
                $data = $fileName;
                $posts->photo = $data;
        }
        $posts->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
