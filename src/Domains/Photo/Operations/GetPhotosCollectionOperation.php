<?php

namespace Sample\Domains\Photo\Operations;

use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Sample\Foundation\Dispatcher;

/**
 * Class GetPhotosCollectionOperation
 *
 * @category
 * @package Sample\Domains\Photo\Operations
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class GetPhotosCollectionOperation extends Dispatcher
{

    protected $commands = [
        'Sample\Domains\Photo\Commands\CreatePhotoEntityCommand',
        'Sample\Domains\Photo\Commands\FormatPhotoFieldsCommand',
    ];

    /**
     * @param null $photos
     */
    public function __construct($photos)
    {
        $this->photos = $photos;
    }


    public function handle(Request $request, IlluminateDispatcher $dispatcher)
    {
        $photosCollection = new Collection();

        foreach ($this->photos as $photo) {

            // get photo entity
            $photoEntity = $dispatcher->dispatchFrom('Sample\Domains\Photo\Commands\CreatePhotoEntityCommand',
                $request
            );

            // format and set photo fields
            $photoEntity = $dispatcher->dispatchFrom('Sample\Domains\Photo\Commands\FormatPhotoFieldsCommand', $request,
                [
                    'entity' => $photoEntity,
                    'data'   => $photo
                ]
            );

            // add to entity to collection
            $photosCollection->push($photoEntity);

        }

        return $photosCollection;
    }

}
