<?php

namespace App\Http\Controllers;

use App\{Post, Category, User};
use Response;
//use Artesaos\SEOTools\Facades\SEOTools;

class PostController extends Controller
{
    public function index()
    {
//        SEOTools::setTitle('Home');
//        SEOTools::setDescription('Blog2020 posts');
//        SEOTools::opengraph()->setUrl('https://blog.lpage.cc');
//        SEOTools::setCanonical('https://blog.lpage.cc');

        $posts = cache()->remember('posts-' . request()->page, now()->addMinutes(60), function(){
            return Post::publicPosts()->paginate(15);
        });
        return view('posts', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = cache()->remember('post-' . $slug, now()->addMinutes(60), function() use ($slug){
            return Post::publicPost()->where('slug', $slug)->firstOrFail();
        });

        $post->increment('views');
        $post->views = Post::whereId($post->id)->select('views')->first()->views;

//        SEOTools::setTitle($post->title);
//        SEOTools::setDescription($post->seo_description);
//        SEOTools::opengraph()
//            ->setUrl(route('posts.show', $slug))
//            ->addImage($post->img);
//        SEOTools::setCanonical(route('posts.show', $slug));

        return view('post', compact('post'));
    }

    public function loadPostsAjax(){
        $page = ( (int) request()->page)? (int) request()->page : 1;
        $perPage = 15;
        $offset =  $perPage * $page;
        $posts = cache()->remember('loaded_posts-' . $page, now()->addMinutes(60), function() use($offset, $perPage){
            return Post::publicPosts()->offset($offset)->limit($perPage)->get();
        });
        return view('parts.load_posts_ajax', compact('posts'));
    }

    public function sitemap(){
        //ToDo экранирование символов &,',",<,>
        $categories = cache()->remember('sitemap-categories', now()->addDays(3), function(){
            return Category::whereActive(1)->select('slug', 'updated_at')->get();
        });
        $authors = cache()->remember('sitemap-authors', now()->addDays(3), function(){
            return User::select('slug')->get();
        });
        $posts = cache()->remember('sitemap-posts', now()->addDays(3), function(){
            return Post::whereActive(1)->select('slug', 'updated_at')->get();
        });

        return Response::view('sitemap', compact('categories', 'authors', 'posts'))->header('Content-Type', 'application/xml');
    }

}
