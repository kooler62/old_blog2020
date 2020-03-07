<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'description', 'text', 'keywords', 'active', 'position'
    ];

    public function getImgAttribute($value)
    {
        return asset($value);
    }

    public function scopeHeaderCategories($query){
        $categories = cache()->remember('categories', now()->addDays(30), function () use ($query)  {
            return $query->whereActive(1)->orderBy('position')->select(['id', 'title', 'slug'])->get();
        });
        return $categories;
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function scopeApiV1PublicCategories($query)
    {
        return $query->whereActive(1)
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'text', 'position']);
    }

    public function scopeApiV1PublicCategory($query, int $id)
    {
        return $query->whereActive(1)
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'text'])
            ->findOrFail($id);
    }

    public function scopeApiV2PublicCategories($query)
    {
        return $query->whereActive(1)
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'text', 'position']);
    }

    public function scopeApiV2PublicCategory($query, int $id)
    {
        return $query->whereActive(1)->with('posts')
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'text'])
            ->findOrFail($id);
    }
}
