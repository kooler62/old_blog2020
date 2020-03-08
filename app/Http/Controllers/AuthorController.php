<?php

namespace App\Http\Controllers;

use App\{User, Post};
use Artesaos\SEOTools\Facades\SEOTools;

class AuthorController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Authors');
        SEOTools::setDescription('Blog2020 Authors');
        SEOTools::opengraph()->setUrl(route('authors.index'));
        SEOTools::setCanonical(route('authors.index'));

        //TODO юзер у которо количество активных постов больше 0
        $authors = cache()->remember('authors', now()->addMinutes(60), function(){
            return User::paginate(30);
        });

        return view('authors', compact('authors'));
    }

    public function show(string $slug)
    {
        $author = cache()->remember("author-$slug", now()->addDays(30), function () use($slug) {
            return User::where('slug', $slug)->firstOrFail();
        });

        $posts = cache()->remember("author_posts-$slug-".request()->page, now()->addMinutes(60), function() use($author){
            return Post::publicPosts()->where('author_id', $author->id)->paginate(15);
        });

        SEOTools::setTitle($author->name);
        SEOTools::setDescription($author->description);
        SEOTools::opengraph()
            ->setUrl(route('categories.show', $slug))
            ->addImage($author->avatar);
        SEOTools::setCanonical(route('categories.show', $slug));

        return view('author', compact('author', 'posts'));
    }
}
