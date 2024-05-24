<?php

use App\Models\Post;

it('returns post resource collection', function () {
    Post::factory()->count(10)->create();

    $response = $this->get('/api/posts');

    $response->assertStatus(200);
    $response->assertJsonCount(10, 'data');
});

it('returns posts close to user', function () {
    Post::factory()->create([
        'latitude' => 37.7749295,
        'longitude' => -122.4194155,
    ]);

    $response = $this->get('/api/posts?latitude=37.7749295&longitude=-122.4194155');

    $response->assertStatus(200);
    $response->assertJsonCount(1, 'data');
});

it('does not return posts close to user', function () {
    Post::factory()->create([
        'latitude' => 32.7749295,
        'longitude' => -124.4194155,
    ]);

    $response = $this->get('/api/posts?latitude=37.7749295&longitude=-122.4194155');

    $response->assertStatus(200);
    $response->assertJsonCount(0, 'data');
});
