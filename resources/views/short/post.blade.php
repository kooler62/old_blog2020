@extends('single_post')

@section('header_seo')
    @parent
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="robots" content="none"/>
    <meta name="googlebot" content="noindex, nofollow"/>
    <meta name="yandex" content="none"/>
@endsection

@section('post')
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ $post->img }});">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <a href="{{ route('short.categories.show', $post->category) }}">
                            <span class="post-category text-white bg-{{ $post->category->class }} mb-3">{{ $post->category->title }}</span>
                        </a>
                        <h1 class="mb-4"><a href="#">{{ $post->title }}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block">
                                <a href="{{ route('short.authors.show', $post->author) }}">
                                    <img src="{{ $post->author->avatar }}" alt="Image" class="img-fluid">
                                </a>
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="{{ route('short.authors.show', $post->author) }}">{{ $post->author->name }} </a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }} 👁 {{ $post->views }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section py-lg">
        <div class="container">
            <div class="row blog-entries element-animate">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="post-content-body">{!! $post->text !!}</div>

                    <div class="pt-5">
                        <p>Categories:  <a href="#">Food</a>, <a href="#">Travel</a>  Tags: <a href="#">#manila</a>, <a href="#">#asia</a></p>
                    </div>
                    {{--@include('components.comments')--}}
                </div>
                <!-- END main-content -->
            {{--            @include('layouts.sidebar')--}}

            <!-- END sidebar -->

            </div>
        </div>
    </section>
@endsection()
