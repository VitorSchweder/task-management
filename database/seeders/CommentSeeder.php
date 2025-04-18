<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Task;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $tasks = Task::all();

        foreach ($tasks as $task) {
            Comment::factory()->count(rand(1, 3))->make()->each(function ($comment) use ($task, $users) {
                $comment->task_id = $task->id;
                $comment->user_id = $users->random()->id;
                $comment->save();
            });
        }
    }
}
