<?php

namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepositoryIml implements CommentRepository
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store($params): void
    {
        $this->comment->create($params);
    }

    public function getAllPostComments($id_post)
    {
        return Comment::where('id_post', $id_post)->get();
    }

    public function destroyById($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
    }

    public function update($comment)
    {
        $comment->save();
    }
}
