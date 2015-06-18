<?php

namespace Sample\Applications\Cms\Features;

use Sample\Foundation\Dispatcher;

/**
 * Class DisplayCreateNewArticleForm
 *
 * @category Feature
 * @package Sample\Applications\Cms\Features
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class DisplayCreateNewArticleFormFeature extends Dispatcher
{
    protected $commands = [
        'Sample\Domains\Core\Commands\Response\DisplayViewCommand',
    ];

}
