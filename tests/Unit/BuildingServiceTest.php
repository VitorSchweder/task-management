<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Building;
use App\Services\BuildingService;
use App\Repositories\Building\Contracts\BuildingRepositoryInterface;
use Illuminate\Support\Collection;
use Mockery;

class BuildingServiceTest extends TestCase
{
    public function test_it_gets_tasks_by_building()
    {
        $mock = Mockery::mock(BuildingRepositoryInterface::class);
        $mock->shouldReceive('getAllByIdAndWithRelations')
             ->once()
             ->with(1, ['tasks.assignedUser'])
             ->andReturn(collect());

        $service = new BuildingService($mock);
        $result = $service->getTasks(1);

        $this->assertInstanceOf(Collection::class, $result);
    }
}
