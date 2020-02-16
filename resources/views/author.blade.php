@extends('layouts.author_lay')

@section('title', $author->name)

@section('header_seo')
    <meta name="description" content="{{ $author->name }}">
@endsection

@section('author')
<div class="col-md-5 text-center">
    <img src="{{ $author->avatar }}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
    <h2>{{ $author->name }}</h2>
    <p>{{ $author->description }}</p>
</div>
@endsection

@section('post')
    @foreach($posts as $post)
        <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{ route('posts.show', $post->slug) }}"><img src="{{ $post->img }}" alt="{{ $post->alt_img }}" class="img-fluid rounded"></a>
                <div class="excerpt">
                    <a href="{{ route('categories.show', $post->category->slug) }}">
                        <span class="post-category text-white bg-success mb-3">{{ $post->category->title }}</span>
                    </a>
                    <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left">
                            <img src="{{ $post->author->avatar }}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="{{ route('authors.show', $post->author->slug) }}">{{ $post->author->name }}</a></span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <p>{{ $post->description }}</p>
                    <p><a href="{{ route('posts.show', $post->slug) }}">Read More</a></p>
                </div>
            </div>
        </div>
    @endforeach
@endsection()
