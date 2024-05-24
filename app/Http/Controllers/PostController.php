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
        // TODO custom validator

        $posts = Post::query()->orderByDesc('created_at')->paginate(10);

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
