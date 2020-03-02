<div class="site-section bg-light">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12">
                <h2>Most Viewed Posts</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout">
@php
    $mostViewedPosts = cache()->remember('mostViewedPosts', now()->addMinutes(5), function(){
        return App\Post::mostViewedPosts();
    });
@endphp
            <div class="col-md-5 order-md-2">
                <a href="{{ route('posts.show', $mostViewedPosts[0]->slug) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{ $mostViewedPosts[0]->img }}');">
                    <span class="post-category text-white bg-danger">{{ $mostViewedPosts[0]->category->title }}</span>

                    <div class="text">
                        <h2>{{ $mostViewedPosts[0]->title }}</h2>
                        <span>👁 {{ $mostViewedPosts[0]->pretty_views }}</span>
                    </div>
                </a>
            </div>

            <div class="col-md-7">

                <a href="{{ route('posts.show', $mostViewedPosts[1]->slug) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ $mostViewedPosts[1]->img }}');">
                    <span class="post-category text-white bg-{{ $mostViewedPosts[1]->category->class }}">{{ $mostViewedPosts[1]->category->title }}</span>
                    <div class="text text-sm">
                        <h2>{{ $mostViewedPosts[1]->title }}</h2>
                        <span>👁 {{ $mostViewedPosts[1]->pretty_views }}</span>
                    </div>
                </a>

                <div class="two-col d-block d-md-flex">
                    <a href="{{ route('posts.show', $mostViewedPosts[2]->slug) }}" class="hentry v-height img-2 gradient" style="background-image: url('{{ $mostViewedPosts[2]->img }}');">
                        <span class="post-category text-white bg-{{ $mostViewedPosts[2]->category->class }}">{{ $mostViewedPosts[2]->category->title }}</span>
                        <div class="text text-sm">
                            <h2>{{ $mostViewedPosts[2]->title }}</h2>
                            <span>👁 {{ $mostViewedPosts[2]->pretty_views }}</span>
                        </div>
                    </a>
                    <a href="{{ route('posts.show', $mostViewedPosts[3]->slug) }}" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('{{ $mostViewedPosts[3]->img }}');">
                        <span class="post-category text-white bg-{{ $mostViewedPosts[3]->category->class }}">{{ $mostViewedPosts[3]->category->title }}</span>
                        <div class="text text-sm">
                            <h2>{{ $mostViewedPosts[3]->title }}</h2>
                            <span>👁 {{ $mostViewedPosts[3]->pretty_views }}</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
