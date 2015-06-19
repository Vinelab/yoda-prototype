<?php

namespace Sample\Domains\Article;

use Sample\Foundation\Builder;
use Sample\Domains\Article\Entities\Article;

class ArticleBuilder extends Builder
{
    protected $parts = ['title', 'slug', 'body', 'photos', 'cover', 'author'];

    public function make()
    {
        return Article::write($this->title, $this->slug, $this->body, $this->author, $this->photos, $this->cover);
    }
}
