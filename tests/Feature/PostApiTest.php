<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Post;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_posts()
    {
        Post::factory()->count(3)->create();

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200)
                 ->assertJsonStructure(['data']);
    }

    /** @test */
    public function it_can_search_posts_by_title()
    {
        Post::factory()->create(['title' => 'Laravel Tips']);
        Post::factory()->create(['title' => 'VueJS Tricks']);

        $response = $this->getJson('/api/posts?search=Laravel');

        $response->assertStatus(200);
        $this->assertCount(1, $response->json('data'));
    }
}
