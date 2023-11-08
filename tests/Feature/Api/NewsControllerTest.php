<?php

namespace Api;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testIndexMethod(): void
    {
        Post::factory()->count(10)->create(['state' => false]);
        Post::factory()->count(2)->create(['state' => true]);
        $response = $this->getJson('/api/news');

        $response->assertStatus(200);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('links', $response);
        $this->assertArrayHasKey('title', $response['data'][0]);
        $this->assertArrayHasKey('description', $response['data'][0]);
        $this->assertArrayNotHasKey('text', $response['data'][0]);
        $this->assertCount(2, $response['data']);
    }

    public function testShowMethod()
    {
        $post = Post::factory()->create();
        $response = $this->getJson('/api/news/' . $post->id);
        $response
            ->assertStatus(200)
            ->assertJsonPath('data.id', $post->id);
        $this->assertArrayHasKey('description', $response['data']);
    }

    public function testShowMethodReturnsNotFoundError()
    {
        $response = $this->getJson('/api/news/3333');
        $response
            ->assertStatus(404)
            ->assertJson(['message' => 'Unable to locate the post you requested']);
    }

    public function testUpdateStateMethod()
    {
        $post = Post::factory()->create(['state' => false]);
        $this->assertFalse((bool) $post->state);

        $response = $this->patchJson('/api/news/' . $post->id . '/update-state');

        $response->assertStatus(Response::HTTP_PARTIAL_CONTENT);
        $this->assertTrue($response['new-state']);

        $post = Post::find($post->id);
        $this->assertTrue((bool) $post->state);
    }

    public function testUpdateStateMethodReturnsNotFoundError()
    {
        $response = $this->patchJson('/api/news/3333/update-state');
        $response
            ->assertStatus(404)
            ->assertJson(['message' => 'Unable to locate the post you requested']);
    }
}
