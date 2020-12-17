<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::with(
            ['author', 'category', 'tags', 'images', 'videos', 'comments' => function ($query) {
                $query->with(['author']);
            }]
        )->find($id);
        return new PostResource($post);
    }

    public function comments($id)
    {
        $posts = Post::find($id);
        $comments = $posts->comments->all();
        return CommentResource::collection($comments);
    }
}
