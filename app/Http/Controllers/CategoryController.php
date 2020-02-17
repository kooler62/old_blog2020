<?php

namespace App\Http\Controllers;

use App\{Category, Post};

class CategoryController extends Controller
{
    public function index()
    {
        $categories = cache()->remember('categories', now()->addDays(30), function () {
            return Category::whereActive(1)->paginate(50);
        });
        return view('categories', compact('categories'));
    }

    public function show(string $slug)
    {
        $category = cache()->remember("category-$slug", now()->addDays(30), function () use($slug) {
            return Category::whereSlugAndActive($slug, 1)->firstOrFail();
        });

        $posts = cache()->remember("category_posts-$slug-".request()->page, now()->addMinutes(60), function() use($category){
            return Post::publicPosts()->where('category_id', $category->id)->paginate(10);
        });
        return view('category', compact('category', 'posts'));
    }
}
