<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use App\Models\Building;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $buildings = Building::all();

        Task::factory()->count(20)->make()->each(function ($task) use ($users, $buildings) {
            $task->assigned_user_id = $users->random()->id;
            $task->building_id = $buildings->random()->id;
            $task->save();
        });
    }
}
