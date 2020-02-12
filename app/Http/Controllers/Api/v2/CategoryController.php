<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v2\CategoryResource;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::apiPublicCategories()->paginate(10);
        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
}
