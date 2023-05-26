<?php

namespace App\Repositories\Tag;

use App\Models\Tag;

class TagRepositoryImpl implements TagRepository
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getAllTag()
    {
        return Tag::query()->get();
    }

    public function getAllTagPaginate()
    {
        return Tag::paginate(5);
    }

    public function store($params): void
    {
        $this->tag->create($params);
    }

    public function updateById($params, $id): void
    {
        $tag = Tag::find($id);
        $tag->name = $params->input('name');
        $tag->slug = $params->input('slug');

        $tag->save();
    }

    public function destroyById($id): void
    {
        $tag = Tag::find($id);
        $tag->delete();
    }

}
