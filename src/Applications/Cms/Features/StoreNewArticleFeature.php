<?php

namespace Sample\Applications\Cms\Features;

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

        'Sample\Domains\Photo\Operations\GetPhotosOperation',
        'Sample\Domains\Article\Commands\AttachPhotosToArticleCommand',

        'Sample\Domains\Article\Commands\StoreArticleCommand',
    ];

}
