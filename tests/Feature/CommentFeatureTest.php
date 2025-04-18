<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use App\Models\Building;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_add_comment()
    {
        $user = User::factory()->create();
        $building = Building::factory()->create();
        $task = Task::factory()->create([
            'assigned_user_id' => $user->id,
            'building_id' => $building->id
        ]);

        $response = $this->postJson('/api/comments', [
            'task_id' => $task->id,
            'user_id' => $user->id,
            'comment' => 'Comment example'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['comment' => 'Comment example']);
    }
}
