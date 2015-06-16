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


    public function handle(Request $request, IlluminateDispatcher $dispatcher)
    {
        $articleEntity = $dispatcher->dispatchFrom('Sample\Domains\Article\Commands\CreateArticleEntityCommand',
            $request
        );

        // FIELDS:

        $articleEntity = $dispatcher->dispatchFrom('Sample\Domains\Article\Commands\FormatArticleTitleCommand',
            $request,
            [
                'entity' => $articleEntity
            ]
        );

        $articleEntity = $dispatcher->dispatchFrom('Sample\Domains\Article\Commands\FormatArticleBodyCommand', $request,
            [
                'entity' => $articleEntity
            ]
        );

        // PHOTOS:

        $photosCollection = $dispatcher->dispatchFrom('Sample\Domains\Photo\Operations\GetPhotosCollectionOperation',
            $request);

        $articleEntity = $dispatcher->dispatchFrom('Sample\Domains\Article\Commands\AttachPhotosToArticleCommand',
            $request,
            [
                'entity'           => $articleEntity,
                'photosCollection' => $photosCollection,
            ]);

        // STORAGE:

        $articleEntity = $dispatcher->dispatchFrom('Sample\Domains\Article\Commands\StoreArticleCommand', $request,
            ['entity' => $articleEntity]
        );

        dd('DONE', $articleEntity);
    }

}
