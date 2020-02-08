@extends('layouts.single_post_lay')

@section('post')
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ asset($post->img) }});">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span class="post-category text-white bg-success mb-3">{{ $post->category->title }}</span>
                        <h1 class="mb-4"><a href="#">{{ $post->title }}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ asset($post->author->avatar) }}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By {{ $post->author->name }}</span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
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
