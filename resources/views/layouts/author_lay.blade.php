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

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                @yield('author')
            </div>
            <div class="row">
                @yield('post')
            </div>
        </div>
    </div>

    @include('components.footer')

</div>
@include('components.footer_scripts')
</body>
</html>
