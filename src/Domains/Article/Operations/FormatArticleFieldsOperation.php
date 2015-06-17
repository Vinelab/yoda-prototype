<?php

namespace Sample\Domains\Article\Operations;

use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Sample\Foundation\Dispatcher;

/**
 * Class FormatArticleFieldsOperation
 *
 * @category Operation
 * @package Sample\Domains\Photo\Operations
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatArticleFieldsOperation extends Dispatcher
{

    protected $commands = [
        'Sample\Domains\Article\Commands\FormatArticleTitleCommand',
        'Sample\Domains\Article\Commands\FormatArticleBodyCommand',
    ];

}
