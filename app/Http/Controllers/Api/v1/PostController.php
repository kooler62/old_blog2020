<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::apiV1PublicPosts()->paginate(10);
    }

    public function show(Post $post)
    {
        return Post::apiV1PublicPost($post->id);
    }
}
