<?php

namespace Sample\Domains\Photo\Operations;

use Sample\Foundation\Dispatcher;

/**
 * Class GetPhotosOperation
 *
 * @category
 * @package Sample\Domains\Photo\Operations
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class GetPhotosOperation extends Dispatcher
{

    protected $commands = [

        'Sample\Domains\Photo\Commands\CreatePhotosCollectionCommand',
        'foreach:photos' => [
            'Sample\Domains\Photo\Commands\CreatePhotoEntityCommand',
            'Sample\Domains\Photo\Commands\FormatPhotoFieldsCommand',
            'Sample\Domains\Photo\Commands\AddPhotoToPhotosCollectionCommand',
        ]

    ];

}
