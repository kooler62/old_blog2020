<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'img', 'alt_img', 'seo_description', 'seo_keywords', 'description', 'text', 'active', 'views',
        'category_id', 'author_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeApiPublicPosts($query)
    {
        return $query->whereActive(1)->select([
            'id', 'title', 'slug', 'img', 'alt_img', 'description', 'views', 'category_id', 'author_id', 'created_at']);
    }
}
