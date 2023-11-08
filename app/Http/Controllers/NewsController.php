<?php

namespace App\Http\Controllers;

use App\Http\Resources\MultiplePostsResource;
use App\Http\Resources\SinglePostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $paginatedPosts = Post::where('state', true)->paginate(9);
        return MultiplePostsResource::collection($paginatedPosts);
    }

    public function show(Post $post): SinglePostResource
    {
        return new SinglePostResource($post);
    }

    public function updateState(Post $post): JsonResponse
    {
        $post->toggleState();
        $post->save();
        return response()->json(['new-state' => $post->state], Response::HTTP_PARTIAL_CONTENT);
    }
}
