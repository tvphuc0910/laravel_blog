<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\Tag\TagRepository;
use Illuminate\Http\Request;

class TagService
{
    public function __construct(
        private readonly TagRepository $tagRepository,
    ) {
    }

    public function index()
    {
        return $this->tagRepository->getAllTagPaginate();
    }

    public function getAllTag() {
        return $this->tagRepository->getAllTag();
    }

    public function store(Request $params)
    {
        $this->tagRepository->store($params->validated());
    }

    public function update(Request $params, $tag)
    {
        $this->tagRepository->updateById($params, $tag);
    }

    public function destroy(int $tagId): void
    {
        $this->tagRepository->destroyById($tagId);
    }
}
