<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'class', 'color', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'description', 'text', 'active', 'views',
        'category_id', 'author_id',
    ];

    public function getImgAttribute($value)
    {
        return asset($value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'author_id','id');
    }

    public function scopePublicPosts($query)
    {
        return $query
            ->select('id', 'slug', 'title', 'views', 'category_id', 'author_id', 'img', 'alt_img', 'description', 'created_at')
            ->with([
                'category:id,slug,title,class,color',
                'author:id,name,avatar,slug',
            ])

            ->whereActive(1)
            ->whereHas('category', function($query) {$query->whereActive(1);})
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc');
    }

    public function scopePublicPost($query)
    {
        return $query
            ->with([
                'category:id,slug,title,class,color',
                'author:id,name,avatar,slug',
            ])
            ->whereActive(1)
            ->whereHas('category', function($query) {$query->whereActive(1);});
    }

    public function scopeMostViewedPosts($query)
    {
        return $query
            ->with([
                'category:id,slug,title,class,color',
                'author:id,name,avatar,slug',
            ])
            ->select('id', 'slug', 'title', 'views', 'category_id', 'author_id', 'img', 'alt_img', 'description', 'created_at')
            ->whereActive(1)->orderByDesc('views')->limit(5)
            ->whereHas('category', function($query) {$query->whereActive(1);})
            ->get();
    }

    public function scopeApiV1PublicPosts($query)
    {
        return $query->whereActive(1)
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'description', 'views', 'category_id', 'author_id', 'created_at']);
    }

    public function scopeApiV1PublicPost($query, int $id)
    {
        return $query->whereActive(1)
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'text', 'views', 'category_id', 'author_id', 'created_at'])
            ->findOrFail($id);
    }

    public function scopeApiV2PublicPosts($query)
    {
        return $query->whereActive(1)->with([
            'category:id,slug,title',
            'author:id,name,avatar,slug',
            ])
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'description', 'views', 'category_id', 'author_id', 'created_at']);
    }
    public function scopeApiV2PublicPost($query, int $id)
    {
        return $query->whereActive(1)
            ->with([
                'category:id,slug,title',
                'author:id,name,avatar,slug',
            ])
            ->select(['id', 'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'views', 'category_id', 'author_id', 'text', 'created_at'])
            ->findOrFail($id);
    }
}
