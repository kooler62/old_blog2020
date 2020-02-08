<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

@include('components.header')
    {{--@include('components.top_posts')--}}

    @section('posts')
        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2>Recent Posts</h2>
                    </div>
                </div>
                <div class="row">
                    @yield('post')
                </div>
                <div class="row text-center pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                            <span>1</span>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <span>...</span>
                            <a href="#">15</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @show()

    @include('components.top_posts2')

    {{--@include('components.subscribe')--}}

    @section('footer')
        @include('components.footer')
    @show()
</div>

@section('footer_scripts')
    @include('components.footer_scripts')
@show()

</body>
</html>
