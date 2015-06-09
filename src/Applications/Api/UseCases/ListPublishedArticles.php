<?php

namespace Sample\Applications\Api\UseCases;

use Sample\Foundation\UseCase;

class ListPublishedArticles extends UseCase
{
        protected $commands = [
            'Sample\Domains\Article\Commands\BuildPublishedArticlesQuery',
            'Sample\Domains\Core\Commands\Querying\SetQueryLimit',
            'Sample\Domains\Core\Commands\Querying\SetQueryOffset',
            'Sample\Domains\Core\Commands\Querying\SetQuerySortingByPublishDate',
            'Sample\Domains\Core\Commands\Content\FilterFeaturedContent',
            'Sample\Domains\Core\Commands\Querying\ExecuteQuery',
            'Sample\Domains\Core\Commands\Response\RespondWithJson',
        ];
}
