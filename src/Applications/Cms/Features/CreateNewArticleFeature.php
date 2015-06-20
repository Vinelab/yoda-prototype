<?php

namespace Sample\Applications\Cms\Features;

use Sample\Foundation\BuilderDispatcher;
use Sample\Domains\Article\ArticleBuilder;
use Sample\Domains\Core\Commands\BuildCommand;
use Sample\Domains\Photo\Commands\MakeNewPhotoCommand;
use Sample\Domains\Article\Commands\SaveArticleCommand;
use Sample\Domains\Article\Commands\MakeNewSlugCommand;
use Sample\Domains\Article\Commands\MakeNewTitleCommand;
use Sample\Domains\Author\Commands\FindAuthorByIdCommand;
use Sample\Domains\Article\Commands\MakeNewContentCommand;
use Sample\Domains\Photo\Commands\MakeNewPhotosCollectionCommand;

class CreateNewArticleFeature extends BuilderDispatcher
{
    protected $builder = ArticleBuilder::class;

    protected $commands = [
        'title'   => MakeNewTitleCommand::class,
        'slug'    => MakeNewSlugCommand::class,
        'content' => MakeNewContentCommand::class,
        'cover'   => [MakeNewPhotoCommand::class, ['photo' => 'cover']],
        'photos'  => MakeNewPhotosCollectionCommand::class,
        'author'  => FindAuthorByIdCommand::class,
        BuildCommand::class,
        SaveArticleCommand::class => 'article',
    ];
}
