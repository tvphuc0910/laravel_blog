<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model implements Searchable
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'content',
        'photo',
        'category_id',
        'tag',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'id_post', 'id_tag');
    }

    public function getSearchResult(): SearchResult
    {
        $url = $this->slug;

        return new SearchResult(
            $this,
            $this->title,
            $url,
            $this->photo,
            $this->description,
            $this->category,
        );
    }

    public function latestPost()
    {
        return $this->latest();
    }
}
