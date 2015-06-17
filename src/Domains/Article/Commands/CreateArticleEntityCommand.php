<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Entities\Article;
use Sample\Foundation\Command;

/**
 * return the empty entity
 *
 * @category Command
 * @package  Sample\Domains\Article\Commands
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class CreateArticleEntityCommand extends Command implements SelfHandling
{

    /**
     * @param \Sample\Domains\Article\Entities\Article $article
     *
     * @return $this
     */
    public function handle(Article $article)
    {
        $this->set('article', $article);
    }

}
