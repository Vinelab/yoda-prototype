<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Parts\Content;
use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Entities\Article;
use Sample\Domains\Article\ArticleRepository;

class SaveArticleCommand extends Command
{
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function handle(ArticleRepository $articles)
    {
        return $articles->add($this->article);
    }
}
