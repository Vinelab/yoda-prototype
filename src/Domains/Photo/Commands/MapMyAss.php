<?php

namespace Sample\Domains\Photo\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Photo\Entities\Photo;
use Sample\Foundation\Command;

/**
 * Class MapPhotosDataToEntitiesCommand
 *
 * @category
 * @package Sample\Domains\Photo\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class MapMyAss extends Command implements SelfHandling
{

    public function __construct($data, $photos)
    {
        $this->data = $data;
        $this->photos = $photos;
    }

    public function handle()
    {

        foreach($this->photos as $photo_data){
            $photo_entity = new Photo();
            $photo_entity->original = $photo_data['original'];
            $photo_entity->thumbnail = $photo_data['thumbnail'];
            $photo_entity->small = $photo_data['small'];

            $this->data->photos = $photo_entity;
        }
        dd($this->data);
        return $this->data;
    }

}
