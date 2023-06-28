<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id_post)
    {
        $like  = Like::where('id_post', $id_post)->where('id_user', session('id'))->count();
//        dd($like);
        if ($like) {
            $like = Like::where('id_post', $id_post)->where('id_user', session('id'))->firstOrFail();
            $like->delete();
        } else {
            Like::create([
                'id_post' => $id_post,
                'id_user' => session('id'),
            ]);
        }
        return redirect()->back();
    }
}
