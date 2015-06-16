<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * return the empty entity
 *
 * @category Command
 * @package  Sample\Domains\Article\Commands
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class AttachPhotosToArticleCommand extends Command implements SelfHandling
{

    /**
     * @var
     */
    private $entity;

    /**
     * @var
     */
    private $photosCollection;

    public function __construct($entity, $photosCollection)
    {
        $this->entity = $entity;
        $this->photosCollection = $photosCollection;
    }

    public function handle()
    {
        $this->entity->setRelation('photos', $this->photosCollection);

        return $this->entity;
    }

}
