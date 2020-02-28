<?php

namespace App\Http\Controllers;

use App\{Category, Post};
use Artesaos\SEOTools\Facades\SEOTools;

class CategoryController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Categories');
        SEOTools::setDescription('Blog2020 Categories');
        SEOTools::opengraph()->setUrl(route('categories.index'));
        SEOTools::setCanonical(route('categories.index'));

        $categories = cache()->remember('categories', now()->addDays(30), function () {
            return Category::whereActive(1)->paginate(30);
        });
        return view('categories', compact('categories'));
    }

    public function show(string $slug)
    {
        $category = cache()->remember("category-$slug", now()->addDays(30), function () use($slug) {
            return Category::whereSlugAndActive($slug, 1)->firstOrFail();
        });

        $posts = cache()->remember("category_posts-$slug-".request()->page, now()->addMinutes(60), function() use($category){
            return Post::publicPosts()->where('category_id', $category->id)->paginate(15);
        });

        SEOTools::setTitle($category->title);
        SEOTools::setDescription($category->seo_description);
        SEOTools::opengraph()
            ->setUrl(route('categories.show', $slug))
            ->addImage($category->img);
        SEOTools::setCanonical(route('categories.show', $slug));

        return view('category', compact('category', 'posts'));
    }
}
