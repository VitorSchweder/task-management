<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Comment;
use App\Services\CommentService;
use App\Repositories\Comment\Contracts\CommentRepositoryInterface;
use Mockery;

class CommentServiceTest extends TestCase
{
    public function test_it_creates_comment()
    {
        $mock = Mockery::mock(CommentRepositoryInterface::class);
        $mock->shouldReceive('create')
             ->once()
             ->andReturn(new Comment(['comment' => 'Test']));

        $service = new CommentService($mock);
        $result = $service->create(['comment' => 'Test']);

        $this->assertInstanceOf(Comment::class, $result);
    }
}
