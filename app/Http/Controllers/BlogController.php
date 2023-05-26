<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $viewData = [
            'posts' => $this->postService->getListPaginate(),
        ];
        return view('blog')->with($viewData);
    }

    public function show($slug)
    {
        $post = $this->postService->findOneBySlug($slug);

        $category = $post->category->id;

        $id = $post->id;

        $suggestedPosts = $this->postService->getListSuggestedPost($category, $id);

        $viewData = [
            'post' => $post,
            'category' => $category,
            'suggestedPosts' => $suggestedPosts,
        ];

        return view('blog-post')->with($viewData);
    }

}
