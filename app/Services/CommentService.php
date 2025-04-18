<?php

namespace App\Services;

use App\Models\Comment;
use App\Repositories\Comment\Contracts\CommentRepositoryInterface;

class CommentService
{
    public function __construct(private CommentRepositoryInterface $commentRepository) {}

    public function create(array $data): Comment
    {
        return $this->commentRepository->create($data);
    }
}