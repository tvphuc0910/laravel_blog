<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function index() {
        return view('search');
    }

    public function search(Request $request) {

        $searchterm = $request->input('query');

        $searchResults = (new Search())->registerModel(Post::class, ['title', 'description'])
            ->perform($searchterm);

        return view('search', compact('searchResults', 'searchterm'));
    }

}
