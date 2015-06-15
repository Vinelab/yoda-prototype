<?php

namespace Sample\Domains\Article\Operations;

use Sample\Foundation\Dispatcher;

/**
 * Class FormatFieldsOperation
 *
 * @category Operation
 * @package Sample\Domains\Article\Operations
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatFieldsOperation extends Dispatcher
{
    protected $commands = [

        'Sample\Domains\Article\Commands\FormatArticleTitleCommand',
        'Sample\Domains\Article\Commands\FormatArticleBodyCommand',

    ];
}
