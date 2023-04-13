<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('blog',[
            'posts' => $posts,
        ]);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        return view('blog-post', compact('post'));
    }

}
