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
    @yield('post')

{{--    @include('components.top_posts2')--}}
{{--    @include('components.subscribe')--}}

    @section('footer')
        @include('components.footer')
    @show()
</div>

@section('footer_scripts')
    @include('components.footer_scripts')
@show()

</body>
</html>
