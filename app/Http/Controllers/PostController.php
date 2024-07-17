<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\PostsFilter;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(Request $request): \Illuminate\Http\JsonResponse
    {
        $posts = Post::with('category');

        $posts = (new PostsFilter($posts, $request ))->apply()->get();

        return response()->json([
            'success' => true,
            'data' => PostResource::collection($posts)
        ]);
    }

    public function store(PostRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        $post = Post::create($data);

        return response()->json([
            'success' => true,
            'data' => $post->id
        ]);
    }
}
