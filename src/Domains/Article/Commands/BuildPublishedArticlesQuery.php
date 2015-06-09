<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Entities\Article;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Build a query for articles.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class BuildPublishedArticlesQuery extends Command implements SelfHandling
{
    public function handle(Article $article)
    {
        return $article->published();
    }
}
