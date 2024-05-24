<?php

use App\Models\Post;

it('returns posts that are close by', function () {
    $this->withoutExceptionHandling();

    Post::factory()->create([
        'latitude' => 37.7749295,
        'longitude' => -122.4194155,
    ]);

    $posts = Post::query()->withinRadius(37.7749295, -122.4194155, 5)->get();

    $this->assertCount(1, $posts);
});

it('does not return posts that are far away', function () {
    Post::factory()->create([
        'latitude' => 32.7749295,
        'longitude' => -124.4194155,
    ]);

    $posts = Post::query()->withinRadius(37.7749295, -122.4194155, 1)->get();

    $this->assertCount(0, $posts);
});
