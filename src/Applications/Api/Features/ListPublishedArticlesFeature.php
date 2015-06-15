<?php

namespace Sample\Applications\Api\Features;

use Sample\Foundation\Dispatcher;

/**
 * Class ListPublishedArticlesFeature
 *
 * @category Feature
 * @package Sample\Applications\Api\Features
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class ListPublishedArticlesFeature extends Dispatcher
{
        protected $commands = [
            'Sample\Domains\Article\Commands\BuildPublishedArticlesQueryCommand',
            'Sample\Domains\Core\Commands\Querying\SetQueryLimitCommand',
            'Sample\Domains\Core\Commands\Querying\SetQueryOffsetCommand',
            'Sample\Domains\Core\Commands\Querying\SetQuerySortingByPublishDateCommand',
            'Sample\Domains\Core\Commands\Content\FilterFeaturedContentCommand',
            'Sample\Domains\Core\Commands\Querying\ExecuteQueryCommand',
            'Sample\Domains\Core\Commands\Response\RespondWithJsonCommand',
        ];
}
