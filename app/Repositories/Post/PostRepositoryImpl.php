<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostRepositoryImpl implements PostRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function store($params): void
    {
        $this->post->create($params)->tag()->attach($params['tag']);
    }

    public function update($post): void
    {
        $post->save();
    }

    public function destroyById($id): void
    {
        $post = Post::find($id);

        $photo = 'storage/'.$post->photo;
        if (File::exists(public_path($photo))) {
            File::delete(public_path($photo));
        } else {
            error_log('File not found');
        }

        $post->delete();
    }

    public function getListPaginate($limit)
    {
        return Post::paginate($limit);
    }

    public function findOneBySlug($slug)
    {
        return Post::with('category')->where('slug', $slug)->first();
    }

    public function getListSuggestedPost($category, $id)
    {
        return Post::where('category_id', $category)->where('id', '!=', $id)->limit(3)->get();
    }

    public function countByCategoryId($id)
    {
        return Post::where('category_id', $id)->count();
    }
}

