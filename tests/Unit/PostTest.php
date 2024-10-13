<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_can_be_created()
    {
        $post = Post::create([
            'title' => 'Sample Post',
            'content' => 'This is a sample post content.',
            'user_id' => User::factory()->create()->id,
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Sample Post',
        ]);
    }

    /** @test */
    public function a_post_can_be_read()
    {
        $post = Post::factory()->create();

        $foundPost = Post::find($post->id);

        $this->assertEquals($post->title, $foundPost->title);
    }

    /** @test */
    public function a_post_can_be_updated()
    {
        $post = Post::factory()->create();

        $post->update([
            'title' => 'Updated Title',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Updated Title',
        ]);
    }

    /** @test */
    public function a_post_can_be_deleted()
    {
        $post = Post::factory()->create();

        $post->delete();

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
