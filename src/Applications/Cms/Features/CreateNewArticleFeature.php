<?php

namespace Sample\Applications\Cms\Features;

use Illuminate\Http\Request;
use Sample\Foundation\Feature;
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

class CreateNewArticleFeature extends Feature
{
    public function handle(Request $request)
    {
        $builder = new ArticleBuilder();

        $builder->title   = $this->call(MakeNewTitleCommand::class, ['title' => $request->input('title')]);
        $builder->slug    = $this->call(MakeNewSlugCommand::class, ['title' => $request->input('title')]);
        $builder->content = $this->call(MakeNewContentCommand::class, ['content' => $request->input('content')]);
        $builder->cover   = $this->call(MakeNewPhotoCommand::class, ['photo' => $request->input('cover')]);
        $builder->photos  = $this->call(MakeNewPhotosCollectionCommand::class, ['photos' => $request->input('photos')]);
        $builder->author  = $this->call(FindAuthorByIdCommand::class, ['author' => $request->input('author')]);

        $article = $this->call(
            SaveArticleCommand::class,
            [
                'article' => $this->call(BuildCommand::class, ['builderInstance' => $builder])
            ]
        );

        return $article;
    }
}
