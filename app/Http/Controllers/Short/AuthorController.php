<?php

namespace App\Http\Controllers\Short;

use App\{Post, User};
use App\Http\Controllers\Controller;
//use Artesaos\SEOTools\Facades\SEOTools;

class AuthorController extends Controller {
    public function index() {

//        SEOTools::setTitle('Authors');
//        SEOTools::setDescription('Blog2020 Authors');
//        SEOTools::opengraph()->setUrl(route('short.authors.index'));
//        SEOTools::setCanonical(route('authors.index'));

        $authors = User::paginate(30);
        return view('short.authors', compact('authors'));
    }

    public function show($slug) {
        $maybeInt = (int) $slug;

        if((string) $slug == "$maybeInt"){
            $author = User::findOrFail($slug);
        }else{
            $author = User::where('slug', $slug)->firstOrFail();
            if ($author){
                return redirect()->route('short.authors.show', $author->id);
            }
        }

        $posts = Post::publicPosts()->where('author_id', $author->id)->paginate(15);

//        SEOTools::setTitle($author->name);
//        SEOTools::setDescription($author->description);
//        SEOTools::opengraph()
//            ->setUrl(route('short.categories.show', $author))
//            ->addImage($author->avatar);
//        SEOTools::setCanonical(route('categories.show', $author->slug));

        return view('short.author', compact('author', 'posts'));
    }
}
