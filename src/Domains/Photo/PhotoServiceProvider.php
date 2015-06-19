<?php

namespace Sample\Domains\Photo;

use Illuminate\Support\ServiceProvider;

class PhotoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Sample\Domains\Core\Contracts\PhotosCollectionInterface', 'Sample\Domains\Photo\PhotosCollection');
    }
}
