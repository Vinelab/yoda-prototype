<?php

namespace Sample\Applications\Cms\Features;

use Sample\Foundation\Feature;

/**
 * Class StoreNewArticle
 *
 * @category
 * @package Sample\Applications\Cms\Features
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class StoreNewArticle extends Feature
{
    protected $commands = [
        'Sample\Domains\Article\Commands\BuildEmptyArticleEntity',
        'Sample\Domains\Article\Commands\FormatArticleTitle',
        'Sample\Domains\Article\Commands\FormatArticleBody'
    ];
}
