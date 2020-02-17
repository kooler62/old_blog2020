<div class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4">About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
            </div>
            <div class="col-md-3 ml-auto">
                <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                <ul class="list-unstyled float-left mr-5">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('categories') }}">Categories</a></li>
                    <li><a href="{{ route('authors') }}">Authors</a></li>
                    <li><a href="{{ route('api') }}">Api</a></li>
                </ul>
                <ul class="list-unstyled float-left">
                    @foreach(\App\Category::headerCategories() as $category)
                        <li><a href="{{ route('categories.show', $category->slug) }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <div>
                    <h3 class="footer-heading mb-4">Connect With Us</h3>
                    <p>
                        <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                        <a href="#"><span class="icon-twitter p-2"></span></a>
                        <a href="#"><span class="icon-instagram p-2"></span></a>
                        <a href="#"><span class="icon-rss p-2"></span></a>
                        <a href="#"><span class="icon-envelope p-2"></span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>Copyright © 2020 | by K62 with <i class="icon-heart text-danger" aria-hidden="true"></i></p>
            </div>
        </div>
    </div>
</div>
