<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use App\Services\TaskService;
use App\Repositories\Task\Contracts\TaskRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Mockery;

class TaskServiceTest extends TestCase
{
    public function test_it_creates_task()
    {
        $mock = Mockery::mock(TaskRepositoryInterface::class);
        $mock->shouldReceive('create')
             ->once()
             ->andReturn(new Task(['title' => 'Teste']));

        $service = new TaskService($mock);
        $result = $service->create(['title' => 'Teste']);

        $this->assertInstanceOf(Task::class, $result);
    }
}
