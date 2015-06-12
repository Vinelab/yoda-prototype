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

    private $entity;

    public function __construct($data)
    {
        $this->entity = $data;
    }

    public function handle(ArticleRepository $repository)
    {
        return $repository->store($this->entity);
    }

}
