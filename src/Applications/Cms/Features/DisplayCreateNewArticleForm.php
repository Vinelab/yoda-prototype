<?php

namespace Sample\Applications\Cms\Features;

use Sample\Foundation\Feature;

/**
 * Class DisplayCreateNewArticleForm
 *
 * @category
 * @package Sample\Applications\Cms\Features
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class DisplayCreateNewArticleForm extends Feature
{
    protected $commands = [
        'Sample\Applications\Cms\Resources\Commands\NewArticleView'
    ];
}
