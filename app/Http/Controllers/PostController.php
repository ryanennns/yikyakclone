<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(Request $request): Response
    {
        $posts = Post::query()->orderByDesc('created_at')->paginate(10);

        $posts = PostResource::collection($posts);

        return Inertia::render('Index', ['posts' => $posts]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Post::query()->create($request->all());

        return response()->json(['message' => 'Post created!'], 201);
    }
}
