@extends('layouts.authors_lay')

@section('title', 'Authors')

@section('header_seo')
    <meta name="description" content="Authors pages">
@endsection

@section('authors')
    @foreach($authors as $author)
        <div class="col-md-6 col-lg-4 mb-5 text-center">
            <a href="{{ route('authors.show', $author->slug) }}">
                <img src="{{ $author->avatar }}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
            </a>
            <a href="{{ route('authors.show', $author->slug) }}"> <h2 class="mb-3 h5">{{ $author->name }}</h2></a>
            <p>{{ $author->description }}</p>

            <p class="mt-5">
                <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                <a href="#" class="p-3"><span class="icon-twitter"></span></a>
            </p>
        </div>
    @endforeach
@endsection
