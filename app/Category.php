<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'description', 'text', 'keywords', 'active', 'position'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function scopeApiPublicCategories($query)
    {
        return $query->whereActive(1)
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'text', 'position']);
    }
}
