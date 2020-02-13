<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'v1' => route('api.v1')
        ]);
    }

    public function v1()
    {
        return response()->json([
            'authors' => route('api.authors.index'),
            'categories' => route('api.categories.index'),
            'posts' => route('api.posts.index'),
        ]);
    }
}
