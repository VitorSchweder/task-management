<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Collection;
use App\Repositories\Task\Contracts\TaskRepositoryInterface;

class TaskService
{
    public function __construct(private TaskRepositoryInterface $taskRepository) {}

    public function getAllWithFilters(array $filters): Collection
    {
        return $this->taskRepository->getAllWithFilters($filters);
    }

    public function create(array $data): Task
    {
        return $this->taskRepository->create($data);
    }

    public function getWithComments(int $taskId): Task
    {
        return $this->taskRepository->getWithComments($taskId);
    }
}