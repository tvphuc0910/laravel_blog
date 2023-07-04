<?php

namespace App\Services;

use App\Models\Comment;
use App\Repositories\Comment\CommentRepository;
use Illuminate\Http\Request;

class CommentService
{
    public function __construct(
        private readonly CommentRepository $commentRepository,
    ) {

    }

    public function store(Request $params)
    {
        $this->commentRepository->store($params->validated());
    }

    public function getAllPostComments($id_post)
    {
        return $this->commentRepository->getAllPostComments($id_post);
    }

    public function destroy($commentId)
    {
        $this->commentRepository->destroyById($commentId);
    }

    public function update(Request $params, $comment)
    {
        $comment = Comment::find($comment);
        $comment->content = $params->input('content');

        $this->commentRepository->update($comment);
    }
}
