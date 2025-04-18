<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * @param CommentService $commentService
     */
    public function __construct(private CommentService $commentService) {}

    public function store(CommentRequest $request): JsonResponse
    {
        $comment = $this->commentService->create($request->validated());
        return response()->json($comment, 201);
    }
}
