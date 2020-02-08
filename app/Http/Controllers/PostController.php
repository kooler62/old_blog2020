<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = cache()->remember('posts-' . request()->page, now()->addMinutes(60), function(){
            return Post::publicPosts()->paginate(10);
        });
        return view('home', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = cache()->remember('post-' . $slug, now()->addMinutes(60), function() use ($slug){
            return Post::publicPost()->where('slug', $slug)->firstOrFail();
        });

        $post->increment('views');
        return view('blog.post', compact('post'));
    }
}
