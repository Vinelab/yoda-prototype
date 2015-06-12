<?php

namespace Sample\Applications\Cms\Features;

use Sample\Foundation\Feature;

/**
 * Class StoreNewArticle
 *
 * @category Feature
 * @package Sample\Applications\Cms\Features
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class StoreNewArticleFeature extends Feature
{
    protected $commands = [
        'Sample\Domains\Article\Commands\BuildEmptyArticleEntityCommand',
        'Sample\Domains\Article\Commands\FormatArticleTitleCommand',
        'Sample\Domains\Article\Commands\FormatArticleBodyCommand',
        'Sample\Domains\Article\Commands\StoreArticleCommand',
    ];
}
