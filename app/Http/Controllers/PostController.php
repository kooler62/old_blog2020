<?php

namespace App\Http\Controllers;

use App\Post;
use Artesaos\SEOTools\Facades\SEOTools;

class PostController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Home');
        SEOTools::setDescription('Blog2020 posts');
        SEOTools::opengraph()->setUrl('https://blog.lpage.cc');
        SEOTools::setCanonical('https://blog.lpage.cc');

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

        SEOTools::setTitle($post->title);
        SEOTools::setDescription($post->seo_description);
        SEOTools::opengraph()
            ->setUrl(route('posts.show', $slug))
            ->addImage($post->img);
        SEOTools::setCanonical(route('posts.show', $slug));

        return view('post', compact('post'));
    }
}
