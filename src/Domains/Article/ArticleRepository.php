<?php

namespace Sample\Domains\Article;

use Sample\Domains\Article\Entities\Article;

class ArticleRepository
{
    public function add(Article $article)
    {
        dd('Saving This Article', $article);
    }
}
