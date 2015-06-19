<?php

namespace Sample\Domains\Photo;

use Sample\Domains\Photo\Entities\Photo;

class PhotoService
{
    public function getPhotosCollection($photos)
    {
        return new PhotosCollection();
    }

    public function make($photo)
    {
        return new Photo();
    }
}
