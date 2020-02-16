<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = cache()->remember('api_v2_posts-' . request()->page, now()->addMinutes(60), function(){
            return Post::apiV2PublicPosts()->paginate(10);
        });
        return $posts;
    }

    public function show(Post $post)
    {
        $post = cache()->remember('api_v2_post-' . $post->id, now()->addMinutes(60), function() use ($post){
            return Post::apiV2PublicPost($post->id);
        });
        return $post;
    }
}
