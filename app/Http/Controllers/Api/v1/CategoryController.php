<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::apiV1PublicCategories()->paginate(10);
    }

    public function show(Category $category)
    {
        return Category::apiV1PublicCategory($category->id);
    }
}
