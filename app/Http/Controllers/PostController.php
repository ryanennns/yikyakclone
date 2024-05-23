<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(Request $request): Response
    {
        $posts = Post::query()->paginate(10);

        $posts = PostResource::collection($posts);

        return Inertia::render('Index', ['posts' => $posts]);
    }
}
