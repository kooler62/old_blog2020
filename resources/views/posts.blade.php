@extends('layouts.home_lay')

@section('title', 'Blog home')

@section('header_seo')
    <meta name="description" content="Blog2020 posts">
@endsection

@section('post')

@foreach($posts as $post)
    <div class="col-lg-4 mb-4">
        <div class="entry2">
            <a href="{{ route('posts.show', $post->slug) }}"><img src="{{ $post->img }}" alt="{{ $post->alt_img }}" class="img-fluid rounded"></a>
            <div class="excerpt">
                <a href="{{ route('categories.show', $post->category->slug) }}">
                    <span class="post-category text-white bg-{{ $post->category->class }} mb-3">{{ $post->category->title }}</span>
                </a>
                <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                <div class="post-meta align-items-center text-left clearfix">
                    <figure class="author-figure mb-0 mr-3 float-left">
                        <a href="{{ route('authors.show', $post->author->slug) }}"><img src="{{ $post->author->avatar }}" alt="Image" class="img-fluid"></a></figure>
                    <span class="d-inline-block mt-1">By <a href="{{ route('authors.show', $post->author->slug) }}">{{ $post->author->name }}</a></span>
                    <span>- {{ $post->created_at->diffForHumans() }} | 👁&nbsp;{{ $post->pretty_views }}</span>
                </div>

                <p>{{ $post->description }}</p>
                <p><a href="{{ route('posts.show', $post->slug) }}">Read More</a></p>
            </div>
        </div>
    </div>
@endforeach
<div id="loaded_posts"></div>
@endsection()

@section('pagination')

    <div class="row">
        <button id="more_content_button" data-page="{{ (request()->page) ? request()->page : 1 }}" onclick="load_posts()">More</button>
    </div>

    {{ $posts->links() }}
@endsection()

@section('footer_scripts')
    <script>
        function load_posts() {
            let button = $("#more_content_button");
            let page = $(button).attr('data-page');
            $.ajax({
                url: "{{ route('load_posts_ajax') }}?page=" + page,
                type: "GET",
                success: function(data) {
                    if(data){
                        $("#more_content_button").attr('data-page', +page+1);
                        $(data).insertBefore($('#loaded_posts'));
                    }else{
                        button.remove();
                    }
                }
            });
        }
    </script>
@endsection()
