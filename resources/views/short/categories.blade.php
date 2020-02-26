@extends('categories')

@section('header_seo')
    @parent
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="robots" content="none"/>
    <meta name="googlebot" content="noindex, nofollow"/>
    <meta name="yandex" content="none"/>
@endsection

@section('categories')
    @foreach($categories as $category)
        <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{ route('short.categories.show', $category) }}"><img src="{{ $category->img }}" alt="Image" class="img-fluid rounded"></a>
                <div class="excerpt">
                    <h2><a href="{{ route('short.categories.show', $category) }}">{{ $category->title }}</a></h2>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
