<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Entities\Article;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class BuildPublishedArticlesQueryCommand
 *
 * @category Command
 * @package Sample\Domains\Article\Commands
 * @author Abed Halawi <abed.halawi@vinelab.com>
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class BuildPublishedArticlesQueryCommand extends Command implements SelfHandling
{
    public function handle(Article $article)
    {
        return $article->published();
    }
}
