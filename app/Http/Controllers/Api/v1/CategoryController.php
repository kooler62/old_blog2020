<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = cache()->remember('api_v1_categories-' . request()->page, now()->addMinutes(60), function(){
            return Category::apiV1PublicCategories()->paginate(10);
        });
        return $categories;
    }

    public function show(Category $category)
    {
        $category = cache()->remember('api_v1_category-' . $category->id, now()->addMinutes(60), function() use ($category){
            return Category::apiV1PublicCategory($category->id);
        });
        return $category;
    }
}
