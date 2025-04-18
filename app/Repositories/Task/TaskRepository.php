<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;
use App\Repositories\Task\Contracts\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    protected $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    /**
     * {@inheritdoc}
     */
    public function getAllWithFilters(array $filters): Collection
    {
        return $this->model->with('assignedUser', 'building')
            ->when($filters['status'] ?? null, fn($q, $status) => $q->where('status', $status))
            ->when($filters['assigned_user_id'] ?? null, fn($q, $id) => $q->where('assigned_user_id', $id))
            ->when($filters['building_id'] ?? null, fn($q, $bid) => $q->where('building_id', $bid))
            ->when($filters['from'] ?? null, fn($q, $from) => $q->whereDate('created_at', '>=', $from))
            ->when($filters['to'] ?? null, fn($q, $to) => $q->whereDate('created_at', '<=', $to))
            ->get();
    }

    /**
     * {@inheritdoc}
     */
    public function getWithComments(int $taskId): Task
    {
        return $this->model->with('comments.user')->findOrFail($taskId);
    }
}