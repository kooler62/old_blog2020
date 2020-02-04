<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'description', 'text', 'active', 'views',
        'category_id', 'author_id',
    ];
}
