<?php

namespace App\Repositories\Building;

use App\Models\Building;
use App\Repositories\BaseRepository;
use App\Repositories\Building\Contracts\BuildingRepositoryInterface;

class BuildingRepository extends BaseRepository implements BuildingRepositoryInterface
{
    protected $model;

    public function __construct(Building $building)
    {
        $this->model = $building;
    }
}