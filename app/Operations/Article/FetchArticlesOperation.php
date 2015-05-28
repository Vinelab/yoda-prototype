<?php

namespace App\Operations\Article;

use App\Operations\Operation;

class FetchArticlesOperation extends Operation
{
    protected $model = 'Article';

    protected $commands = [
        'Article\BuildArticlesQueryCommand',
        'Content\QueryFeaturedContentCommand',
        'Response\RespondWithJsonCommand'
    ];
}
