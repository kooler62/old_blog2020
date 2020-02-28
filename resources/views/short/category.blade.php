@extends('category')

@section('header_scripts')
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="robots" content="none"/>
    <meta name="googlebot" content="noindex, nofollow"/>
    <meta name="yandex" content="none"/>
@endsection

@section('posts')
    @foreach($posts as $post)
        <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{ route('short.posts.show', $post) }}"><img src="{{ $post->img }}" alt="{{ $post->alt_img }}" class="img-fluid rounded"></a>
                <div class="excerpt">
                    <span class="post-category text-white bg-{{ $post->category->class }} mb-3">{{ $post->category->title }}</span>

                    <h2><a href="{{ route('short.posts.show', $post) }}">{{ $post->title }}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ $post->author->avatar }}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="{{ route('short.authors.show', $post->author) }}">{{ $post->author->name }}</a></span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <p>{{ $post->description }}</p>
                    <p><a href="{{ route('short.posts.show', $post) }}">Read More</a></p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
