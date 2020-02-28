<?php

namespace App\Http\Controllers\Short;

use App\{Category, Post};
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class CategoryController extends Controller {
    public function index() {

        SEOTools::setTitle('Categories');
        SEOTools::setDescription('Blog2020 Categories');
        SEOTools::opengraph()->setUrl(route('short.categories.index'));
        SEOTools::setCanonical(route('categories.index'));

        $categories = Category::whereActive(1)->paginate(30);
        return view('short.categories', compact('categories'));
    }

    public function show(Category $category) {
        $posts = Post::publicPosts()->where('category_id', $category->id)->paginate(15);

        SEOTools::setTitle($category->title);
        SEOTools::setDescription($category->seo_description);
        SEOTools::opengraph()
            ->setUrl(route('short.categories.show', $category))
            ->addImage($category->img);
        SEOTools::setCanonical(route('categories.show', $category->slug));

        return view('short.category', compact('category','posts'));
    }
}
