<?php

namespace App\Operations\Articles;

use App\Operations\Operation;

class ListPublishedArticlesOperation extends Operation
{
    // Commands MUST not inter-communicate
    protected $commands = [
        'App\Domains\Articles\Commands\BuildPublishedArticlesQueryCommand',
        'App\Core\Commands\Querying\SetQueryLimitCommand',
        'App\Core\Commands\Querying\SetQueryOffsetCommand',
        'App\Core\Commands\Querying\SetQuerySortingByPublishDateCommand',
        'App\Core\Commands\Content\FilterFeaturedContentCommand',
        'App\Core\Commands\Querying\ExecuteQueryCommand',
        'App\Core\Commands\Response\RespondWithJsonCommand',
    ];
}
