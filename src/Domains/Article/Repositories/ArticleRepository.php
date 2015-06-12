<?php

namespace Sample\Domains\Article\Repositories;

use Sample\Foundation\Repository;

/**
 * Class ArticleRepository
 *
 * @category Repository
 * @package Sample\Domains\Article\Entities
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class ArticleRepository extends Repository
{

    /**
     * @param $entity
     *
     * @return mixed
     */
    public function store($entity)
    {
        $entity->save();

        return $entity;
    }
}
