<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Category;
use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $postService, $commentService;

    public function __construct(PostService $postService, CommentService $commentService)
    {
        $this->postService = $postService;
        $this->commentService = $commentService;
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

        $comments = $this->commentService->getAllPostComments($id);

        $suggestedPosts = $this->postService->getListSuggestedPost($category, $id);

        $like = Like::where('id_post', $id)->count();

        $viewData = [
            'post' => $post,
            'category' => $category,
            'suggestedPosts' => $suggestedPosts,
            'like' => $like,
            'comments' => $comments,
        ];

        return view('blog-post')->with($viewData);
    }

}
