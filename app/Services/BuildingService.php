<?php

namespace App\Services;

use App\Models\Building;
use Illuminate\Support\Collection;
use App\Repositories\Building\Contracts\BuildingRepositoryInterface;

class BuildingService
{
    public function __construct(private BuildingRepositoryInterface $buildingRepository) {}

    public function create(array $data): Building
    {
        return $this->buildingRepository->create($data);
    }

    public function getTasks(int $id): ?Collection
    {
        return $this->buildingRepository->getAllByIdAndWithRelations($id, ['tasks.assignedUser']);
    }
}