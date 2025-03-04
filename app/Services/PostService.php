<?php

namespace App\Services;

use App\Jobs\InsertPostsJob;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function __construct(
        private readonly PostRepository $postRepository,
    ) {
    }

    public function index()
    {
        return $this->postRepository->getListPaginate(10);
    }

    public function store($params): void
    {
        if ($params->hasFile('photo')) {
            $path = Storage::disk('public')->putFile('photo', $params->file('photo'));
            $arr = $params->validated();
            $arr['photo'] = $path;
            $arr['tag'] = $params->tag;
        } else {
            $arr = $params->validated();
            $arr['tag'] = $params->tag;
        }

        $this->postRepository->store($arr);

        Cache::flush();
    }

    public function update($params, $post): void
    {
        $post = Post::find($post);

        $post->category_id = $params->input('category_id');
        $post->tag()->sync($params->tag);
        $post->title = $params->input('title');
        $post->slug = $params->input('slug');
        $post->description = $params->input('description');
        $post->content = $params->input('content');

        if ($params->hasFile('photo')) {
            $photo = 'storage/'.$post->photo;
            if (File::exists(public_path($photo))) {
                File::delete(public_path($photo));
            }
//            $file = $request->file('photo');
//            $fileName = 'photo/'.uniqid().'.'.$extension;
//            $file->move(public_path().'/storage/photo', $fileName);
//            $path = $fileName;
            $path = Storage::disk('public')->putFile('photo', $params->file('photo'));

            $post->photo = $path;
        }

        $this->postRepository->update($post);
    }

    public function destroy(int $postId): void
    {
        $this->postRepository->destroyById($postId);
    }

    public function getListPaginate($limit = 10)
    {
        return $this->postRepository->getListPaginate($limit);
    }

    public function findOneBySlug($slug)
    {
        return $this->postRepository->findOneBySlug($slug);
//        return Post::with('category')->where('slug', $slug)->first();
    }

    public function getListSuggestedPost($category, $id)
    {
        return $this->postRepository->getListSuggestedPost($category, $id);
//        return Post::where('category_id', $category)->where('id', '!=', $id)->limit(3)->get();
    }

    public function countByCategoryId($id)
    {
        return $this->postRepository->countByCategoryId($id);
//        return Post::where('category_id', $id)->count();
    }

    public function search($searchterm)
    {
        $cacheKey = 'search_' . md5($searchterm); // Tạo cache key duy nhất cho mỗi từ khóa tìm kiếm

        return Cache::remember($cacheKey, 600, function () use ($searchterm) {
            return Post::where('title', 'LIKE', '%' . $searchterm . '%')
                ->orWhere('description', 'LIKE', '%' . $searchterm . '%')
                ->paginate(10);
        });
    }

    public function bulkInsert()
    {
        $posts = [];

        for ($i = 1; $i <= 100000; $i++) {
            $posts[] = [
                'category_id' => 1,
                'slug' => rand(),
                'title' => "Bài viết số $i",
                'description' => "Tóm abvavav3 " . rand(),
                'content' => "<p>Nội dung bài viết số $i </p><p>adsf&agrave;&agrave;&agrave;&aacute;dffăewrư&egrave;</p>".rand(),
                'photo' => 'photo/JlA6MsPrqKEzI7IMaoIyx8po1ZiSaIEro8a4CBbC.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $chunks = array_chunk($posts, 5000);
        foreach ($chunks as $chunk) {
            InsertPostsJob::dispatch($chunk);
        }
    }

}
