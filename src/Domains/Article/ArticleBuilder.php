<?php

namespace Sample\Domains\Article;

use Sample\Foundation\Builder;
use Sample\Domains\Article\Entities\Article;

class ArticleBuilder extends Builder
{
    protected $parts = ['title', 'slug', 'content', 'photos', 'cover', 'author'];

    public function make()
    {
        return Article::post($this->title, $this->slug, $this->content, $this->author, $this->photos, $this->cover);
    }
}
