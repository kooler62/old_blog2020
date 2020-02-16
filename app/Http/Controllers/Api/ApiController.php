<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'v1' => route('api.v1'),
            'v2' => route('api.v2')
        ]);
    }

    public function v1()
    {
        return response()->json([
            'authors' => route('api.v1.authors.index'),
            'categories' => route('api.v1.categories.index'),
            'posts' => route('api.v1.posts.index'),
        ]);
    }

    public function v2()
    {
        return response()->json([
            'authors' => route('api.v2.authors.index'),
            'categories' => route('api.v2.categories.index'),
            'posts' => route('api.v2.posts.index'),
        ]);
    }
}
