<?php

namespace App\Http\Controllers\Short;

use App\Post;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class PostController extends Controller {

    public function index() {

        SEOTools::setTitle('Home');
        SEOTools::setDescription('Blog2020 posts');
        SEOTools::opengraph()->setUrl('https://blog.lpage.cc');
        SEOTools::setCanonical('https://blog.lpage.cc');

        $posts = Post::publicPosts()->paginate(15);
        return view('short.posts', compact('posts'));
    }

    public function show(Post $post) {

        SEOTools::setTitle($post->title);
        SEOTools::setDescription($post->seo_description);
        SEOTools::opengraph()
            ->setUrl(route('short.posts.show', $post))
            ->addImage($post->img);
        SEOTools::setCanonical(route('posts.show', $post->slug));

        return view('short.post', compact('post'));
    }
}
