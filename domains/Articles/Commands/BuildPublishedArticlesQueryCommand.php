<?php

namespace App\Domains\Articles\Commands;

use App\Commands\Command;
use App\Domains\Articles\Entities\Article;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Build a query for articles.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class BuildPublishedArticlesQueryCommand extends Command implements SelfHandling
{
    public function handle(Article $article)
    {
        return $article->published();
    }
}
