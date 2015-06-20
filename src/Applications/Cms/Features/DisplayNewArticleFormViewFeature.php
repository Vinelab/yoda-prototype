<?php

namespace Sample\Applications\Cms\Features;

use Sample\Foundation\ViewBuilder;
use Sample\Foundation\BuilderDispatcher;
use Sample\Domains\Core\Commands\Response\DisplayViewCommand;
use Sample\Domains\Article\Commands\GetCreateArticleViewNameCommand;

class DisplayNewArticleFormViewFeature extends BuilderDispatcher
{
    protected $builder = ViewBuilder::class;

    protected $commands = [
        'name' => GetCreateArticleViewNameCommand::class,
        DisplayViewCommand::class
    ];
}
