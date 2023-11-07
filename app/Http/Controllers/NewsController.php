<?php

namespace App\Http\Controllers;

use App\Http\Resources\MultiplePostsResource;
use App\Http\Resources\SinglePostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $paginatedPosts = Post::where('state', true)->paginate(10);
        return MultiplePostsResource::collection($paginatedPosts);
    }

    public function show(Post $post): SinglePostResource
    {
        return new SinglePostResource($post);
    }

    public function updateState(Post $post): Response
    {
        $post->toggleState();
        $post->save();
        return response()->noContent();
    }
}
