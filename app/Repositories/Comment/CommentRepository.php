<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;
use App\Repositories\Comment\Contracts\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}