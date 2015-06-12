<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Entities\Article;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * return the empty entity
 *
 * @category Command
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class BuildEmptyArticleEntityCommand extends Command implements SelfHandling
{
    /**
     * @param \Sample\Domains\Article\Entities\Article $article
     *
     * @return \Sample\Domains\Article\Entities\Article
     */
    public function handle(Article $article)
    {
        return $article;
    }
}
