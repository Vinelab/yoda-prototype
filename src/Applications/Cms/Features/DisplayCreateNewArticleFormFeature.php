<?php

namespace Sample\Applications\Cms\Features;

use Sample\Foundation\Feature;

/**
 * Class DisplayCreateNewArticleForm
 *
 * @category Feature
 * @package Sample\Applications\Cms\Features
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class DisplayCreateNewArticleFormFeature extends Feature
{
    protected $commands = [
        [
            'Sample\Domains\Core\Commands\Response\DisplayViewCommand',
            [
                'name' => 'Cms::article.create'
            ]
        ],
    ];

}
