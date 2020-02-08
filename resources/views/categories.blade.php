@extends('layouts.categories_lay')

@section('categories')
    @foreach($categories as $category)
        <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{ route('categories.show', $category->slug) }}"><img src="{{ asset($category->img) }}" alt="Image" class="img-fluid rounded"></a>
                <div class="excerpt">
                    <h2><a href="{{ route('categories.show', $category->slug) }}">{{ $category->title }}</a></h2>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
