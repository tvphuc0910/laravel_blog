<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('blog',[
            'posts' => $posts,
        ]);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        return view('single-blog-post', compact('post'));
    }

}
