<?php

namespace App\Repositories\Task\Contracts;

use Illuminate\Support\Collection;
use App\Models\Task;

interface TaskRepositoryInterface
{
    /**
     * @param array $filters
     * @return Collection
     */
    public function getAllWithFilters(array $filters): Collection;

    /**
     * @param int $taskId
     * @return Task
     */
    public function getWithComments(int $taskId): Task;
}
