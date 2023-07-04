<?php

namespace App\Repositories\Comment;

interface CommentRepository
{
    /**
     * @param $params
     * @return void
     */
    public function store($params): void;
    public function getAllPostComments($id_post);
    public function destroyById($commentId);
    public function update($comment);
}
