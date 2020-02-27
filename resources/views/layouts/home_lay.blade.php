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
                @yield('pagination')
            </div>
        </div>

    @show()

    @include('components.top_posts2')

    {{--@include('components.subscribe')--}}

    @section('footer')
        @include('components.footer')
    @show()
</div>

@include('components.footer_scripts')
@yield('footer_scripts')

</body>
</html>
