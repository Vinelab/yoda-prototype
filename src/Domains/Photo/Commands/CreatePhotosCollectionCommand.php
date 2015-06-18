<?php

namespace Sample\Domains\Photo\Commands;

use Illuminate\Support\Collection;
use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class CreatePhotosCollectionCommand
 *
 * @category
 * @package Sample\Domains\Photo\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class CreatePhotosCollectionCommand extends Command implements SelfHandling
{

    /**
     * @param \Illuminate\Support\Collection $collection
     */
    public function handle(Collection $collection)
    {
        $this->set('photosCollection', $collection);
    }

}
