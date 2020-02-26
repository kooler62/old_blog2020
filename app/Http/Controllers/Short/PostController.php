<?php

namespace App\Http\Controllers\Short;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller {
    public function index() {
        $posts = Post::publicPosts()->paginate(15);
        return view('short.posts', compact('posts'));
    }

    public function show(Post $post) {
        return view('short.post', compact('post'));
    }
}
