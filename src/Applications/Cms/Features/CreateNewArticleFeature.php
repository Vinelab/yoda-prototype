<?php

namespace Sample\Applications\Cms\Features;

use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Sample\Foundation\Dispatcher;
use Sample\Domains\Article\ArticleBuilder;
use Sample\Domains\Article\ArticleRepository;
use Sample\Domains\Photo\Commands\MakeNewPhotoCommand;
use Sample\Domains\Article\Commands\MakeNewSlugCommand;
use Sample\Domains\Article\Commands\MakeNewTitleCommand;
use Sample\Domains\Author\Commands\FindAuthorByIdCommand;
use Sample\Domains\Article\Commands\MakeNewContentCommand;
use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;
use Sample\Domains\Photo\Commands\MakeNewPhotosCollectionCommand;

class CreateNewArticleFeature extends Dispatcher
{
    public function handle(
        IlluminateDispatcher $dispatcher,
        Request $request,
        ArticleBuilder $builder,
        ArticleRepository $articles,
        Faker $fake
    ) {
        $fake = Faker::create();

        $title = $fake->sentence;

        $builder->title   = $dispatcher->dispatchFrom(MakeNewTitleCommand::class, $request, compact('title'));
        $builder->slug    = $dispatcher->dispatchFrom(MakeNewSlugCommand::class, $request, compact('title'));
        $builder->content = $dispatcher->dispatchFrom(MakeNewContentCommand::class, $request, ['content' => $fake->text]);

        $builder->cover  = $dispatcher->dispatchFrom(MakeNewPhotoCommand::class, $request, ['photo' => $request->input('cover')]);
        $builder->photos = $dispatcher->dispatchFrom(MakeNewPhotosCollectionCommand::class, $request, ['photos' => []]);
        $builder->author = $dispatcher->dispatchFrom(FindAuthorByIdCommand::class, $request, ['author_id' => 10]);

        $articles->add($builder->make());
    }
}
