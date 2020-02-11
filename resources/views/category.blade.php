@extends('layouts.category_lay')

@section('title', $category->title)

@section('header_seo')
    <meta name="description" content="{{ $category->seo_description }}">
@endsection

@section('category')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category</span>
                    <h3>{{ $category->title }}</h3>
                    <p>{{ $category->text }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('posts')
    @foreach($posts as $post)
        <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{ route('posts.show', $post->slug) }}"><img src="{{ asset($post->img) }}" alt="{{ $post->alt_img }}" class="img-fluid rounded"></a>
                <div class="excerpt">
                    <span class="post-category text-white bg-secondary mb-3">{{ $post->category->title }}</span>

                    <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset($post->author->avatar) }}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="#">{{ $post->author->name }}</a></span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <p>{{ $post->description }}</p>
                    <p><a href="{{ route('posts.show', $post->slug) }}">Read More</a></p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
