<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{

    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index() {
        return view('search');
    }

    public function search(Request $request) {

        $searchterm = $request->input('query');

        $searchResults = $this->postService->search($searchterm);

        return view('search', compact('searchResults', 'searchterm'));
    }

}
