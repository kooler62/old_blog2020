@extends('authors')

@section('header_scripts')
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="robots" content="none"/>
    <meta name="googlebot" content="noindex, nofollow"/>
    <meta name="yandex" content="none"/>
@endsection

@section('authors')
    @foreach($authors as $author)
        <div class="col-md-6 col-lg-4 mb-5 text-center">
            <a href="{{ route('short.authors.show', $author) }}">
                <img src="{{ $author->avatar }}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
            </a>
            <a href="{{ route('short.authors.show', $author) }}"> <h2 class="mb-3 h5">{{ $author->name }}</h2></a>
            <p>{{ $author->description }}</p>

            <p class="mt-5">
                <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                <a href="#" class="p-3"><span class="icon-twitter"></span></a>
            </p>
        </div>
    @endforeach
@endsection
