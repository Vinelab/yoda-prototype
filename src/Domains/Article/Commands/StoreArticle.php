<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Repositories\ArticleRepository;
use Sample\Foundation\Command;

/**
 * Class StoreArticle
 *
 * @category
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class StoreArticle extends Command implements SelfHandling
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
