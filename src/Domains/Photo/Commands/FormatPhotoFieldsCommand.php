<?php

namespace Sample\Domains\Photo\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Class FormatPhotoFieldsCommand
 *
 * @category
 * @package Sample\Domains\Photo\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatPhotoFieldsCommand extends Command implements SelfHandling
{

    public function __construct($entity, $data)
    {
        $this->entity = $entity;
        $this->data = $data;
    }

    public function handle()
    {
        $this->entity->original = $this->data['original'];
        $this->entity->thumbnail = $this->data['thumbnail'];
        $this->entity->small = $this->data['small'];

        return $this->entity;
    }

}
