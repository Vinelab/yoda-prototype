<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Parts\Content;
use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\ArticleRepository;

class SaveArticleCommand extends Command implements SelfHandling
{
    public function __construct($article)
    {
        $this->article = $article;
    }

    public function handle(ArticleRepository $articles)
    {
        return $articles->add($this->article);
    }
}
