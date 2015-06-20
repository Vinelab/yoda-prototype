<?php

namespace Sample\Domains\Photo\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Photo\PhotoFactory;
use Sample\Domains\Photo\PhotosCollection;
use Illuminate\Contracts\Bus\SelfHandling;

class MakeNewPhotosCollectionCommand extends Command
{
    public function __construct($photos = [])
    {
        $this->photos = $photos ?: [];
    }

    public function handle(PhotosCollection $collection, PhotoFactory $factory)
    {
        foreach ($this->photos as $photo) {
            $collection->push($factory->make($photo));
        }

        return $collection;
    }
}
