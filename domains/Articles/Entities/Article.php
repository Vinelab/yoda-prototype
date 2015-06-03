<?php

namespace App\Domains\Articles\Entities;

use Eloquent;
use Carbon\Carbon;

class Article extends Eloquent
{
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug'  => 'string',
        'is_featured'    => 'boolean',
        'content_type'   => 'string',
        'comments_count' => 'integer',
    ];

    public function scopePublished($query)
    {
        return $query->where('publish_state', '=', 'published')
            ->where('publish_date', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', '=', true);
    }
}
