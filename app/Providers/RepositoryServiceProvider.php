<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Task\TaskRepository;
use App\Repositories\Task\Contracts\TaskRepositoryInterface;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\Contracts\CommentRepositoryInterface;
use App\Repositories\Building\BuildingRepository;
use App\Repositories\Building\Contracts\BuildingRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(BuildingRepositoryInterface::class, BuildingRepository::class);
    }
}
