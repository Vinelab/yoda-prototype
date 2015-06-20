<?php

namespace Sample\Domains\Photo\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Photo\PhotoFactory;
use Sample\Domains\Photo\Entities\Photo;
use Illuminate\Contracts\Bus\SelfHandling;

class MakeNewPhotoCommand extends Command implements SelfHandling
{
    public function __construct($photo)
    {
        $this->photo = $photo;
    }

    public function handle(PhotoFactory $factory)
    {
        return $factory->make($this->photo);
    }
}
