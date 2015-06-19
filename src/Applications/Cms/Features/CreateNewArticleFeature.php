<?php

namespace Sample\Applications\Cms\Features;

use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Sample\Foundation\Dispatcher;
use Sample\Domains\Article\Parts\Body;
use Sample\Domains\Article\Parts\Slug;
use Sample\Domains\Photo\PhotoService;
use Sample\Domains\Article\Parts\Title;
use Sample\Domains\Author\AuthorService;
use Sample\Domains\Article\ArticleBuilder;
use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;

class CreateNewArticleFeature extends Dispatcher
{
    public function handle(
        IlluminateDispatcher $dispatcher,
        Request $request,
        ArticleBuilder $builder,
        PhotoService $photos,
        AuthorService $authors,
        Faker $fake
    ) {
        $fake = Faker::create();

        $title = $fake->sentence;

        $builder->title  = new Title($request->input('title', $title));
        $builder->slug   = new Slug($request->input('title', $title));
        $builder->body   = new Body($request->input('body', $fake->text));
        $builder->cover  = $photos->make($request->input('cover'));
        $builder->photos = $photos->getPhotosCollection($request->input('photos', []));
        $builder->author = $authors->byId($request->input('author_id', 10));

        $article = $builder->make();
        dd($article);
        $articles->add($article);
    }
}
