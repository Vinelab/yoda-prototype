<?php

namespace Sample\Domains\Article\Repositories;

use Sample\Foundation\Repository;

/**
 * Class ArticleRepository
 *
 * @category Repository
 * @package  Sample\Domains\Article\Entities
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
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

        $attributes = $entity->attributesToArray();
        $relations = $entity->relationsToArray();

        if($relations){
            return $entity->createWith($attributes, $relations);
        }

        return $entity->create($attributes);
    }
}
