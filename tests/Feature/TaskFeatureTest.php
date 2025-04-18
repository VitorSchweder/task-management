<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Models\Building;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_task()
    {
        $user = User::factory()->create();
        $building = Building::factory()->create();

        $response = $this->postJson('/api/tasks', [
            'title' => 'New Task',
            'description' => 'Description of task example',
            'status' => 'open',
            'assigned_user_id' => $user->id,
            'building_id' => $building->id,
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['title' => 'New Task']);
    }

    public function test_can_list_tasks_with_filters()
    {
        $this->getJson('/api/tasks?status=open')
             ->assertStatus(200);
    }
}
