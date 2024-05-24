<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'latitude'  => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
        ]);

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $posts = Post::query()->withinRadius($latitude, $longitude, 5)->orderByDesc('created_at')->paginate(10);

        return PostResource::collection($posts)->response();
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'content'  => ['required', 'string'],
            'location' => ['required', 'array'], // TODO custom validator
        ]);

        Post::query()->create([
            'content'   => $request->input('content'),
            'latitude'  => $request->input('location.latitude'),
            'longitude' => $request->input('location.longitude'),
        ]);

        return response()->json(['message' => 'Post created!'], 201);
    }
}
