<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Repositories\ArticleRepository;
use Sample\Foundation\Command;

/**
 * Class StoreArticle
 *
 * @category Command
 * @package  Sample\Domains\Article\Commands
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class StoreArticleCommand extends Command implements SelfHandling
{

    /**
     * @param \Sample\Domains\Article\Repositories\ArticleRepository $repository
     *
     * @return \Sample\Foundation\Transporter
     */
    public function handle(ArticleRepository $repository)
    {
        $article = $this->get('article');

        $repository->store($article);
    }

}
