<?php

namespace Sample\Domains\Photo\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Class AddPhotoToPhotosCollectionCommand
 *
 * @category Command
 * @package  Sample\Domains\Photo\Commands
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class AddPhotoToPhotosCollectionCommand extends Command implements SelfHandling
{

    public function handle()
    {
        $photo = $this->get('photo');
        $photosCollection = $this->get('photosCollection');

        $photosCollection->push($photo);

        $this->set('photosCollection', $photosCollection);
    }

}
