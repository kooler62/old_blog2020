<?php

namespace App\Http\Controllers\Short;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::whereActive(1)->paginate(30);
        return view('short.categories', compact('categories'));
    }

    public function show(Category $category) {
        $posts = Post::publicPosts()->where('category_id', $category->id)->paginate(15);
        return view('short.category', compact('category','posts'));
    }
}
