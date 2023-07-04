<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyCommentRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Services\CommentService;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(StoreCommentRequest $request)
    {
        $this->commentService->store($request);
        return redirect()->back();
    }

    public function destroy(DestroyCommentRequest $request, $comment)
    {
        $this->commentService->destroy($comment);
        return redirect()->back();
    }

    public function update(UpdateCommentRequest $request, $comment)
    {
        $this->commentService->update($request, $comment);
        return redirect()->back();
    }
}
