<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Building;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuildingFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_building()
    {
        $response = $this->postJson('/api/buildings', [
            'name' => 'Building Test'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Building Test']);
    }

    public function test_can_list_building_tasks_with_users()
    {
        $building = Building::factory()->create();

        $response = $this->getJson("/api/buildings/{$building->id}/tasks");

        $response->assertStatus(200);
    }
}
