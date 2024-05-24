<?php

use App\Models\Post;

it('returns post resource collection', function () {
    Post::factory()->count(10)->create();

    $response = $this->get('/api/posts');

    $response->assertStatus(200);
    $response->assertJsonCount(10, 'data');
});
