<?php

namespace Sample\Domains\Photo\Repositories;

use Sample\Foundation\Repository;

/**
 * Class PhotoRepository
 *
 * @category Repository
 * @package Sample\Domains\Article\Repositories
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class PhotoRepository extends Repository
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
