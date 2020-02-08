<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = cache()->remember('categories', now()->addDays(30), function () {
            return Category::whereActive(1)->get();
        });
        return view('categories', compact('categories'));
    }

    public function show(string $slug)
    {
        $category = Category::whereSlugAndActive($slug, 1)->firstOrFail();
        $posts = Post::publicPosts()->where('category_id', $category->id)->paginate(10);
      //  dd($posts);
        //dd($posts->first());
        return view('category', compact('category', 'posts'));
    }
}
