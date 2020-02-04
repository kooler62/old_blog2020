<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'text', 'keywords', 'active', 'position'
    ];
}
