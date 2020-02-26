<?php

namespace App\Http\Controllers\Short;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class AuthorController extends Controller {
    public function index() {
        $authors = User::paginate(30);
        return view('short.authors', compact('authors'));
    }

    public function show(User $author) {
        $posts = Post::publicPosts()->where('author_id', $author->id)->paginate(15);
        return view('short.author', compact('author', 'posts'));
    }
}
