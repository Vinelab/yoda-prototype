<?php

namespace Sample\Applications\Cms\Features;

use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;
use Illuminate\Http\Request;
use Sample\Foundation\Dispatcher;

/**
 * Class StoreNewArticle
 *
 * @category Feature
 * @package  Sample\Applications\Cms\Features
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class StoreNewArticleFeature extends Dispatcher
{

    protected $commands = [
        'Sample\Domains\Article\Commands\CreateArticleEntityCommand',
        'Sample\Domains\Article\Operations\FormatArticleFieldsOperation',

//        'Sample\Domains\Photo\Operations\GetPhotosCollectionOperation', // <<<
//        'Sample\Domains\Article\Commands\AttachPhotosToArticleCommand',

        'Sample\Domains\Article\Commands\StoreArticleCommand',
    ];


//    public function handlerrr(Request $request, IlluminateDispatcher $dispatcher)
//    {
//
//        // PHOTOS:
//
//        $photosCollection = $dispatcher->dispatchFrom('Sample\Domains\Photo\Operations\GetPhotosCollectionOperation',
//            $request);
//
//        $articleEntity = $dispatcher->dispatchFrom('Sample\Domains\Article\Commands\AttachPhotosToArticleCommand',
//            $request,
//            [
//                'entity'           => $articleEntity,
//                'photosCollection' => $photosCollection,
//            ]);
//
//    }

}
