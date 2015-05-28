<?php

namespace App\Commands\Article;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Build a query to fetch articles.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class BuildArticlesQueryCommand extends Command implements SelfHandling
{
    protected $article;

    public function __construct($data)
    {
        $this->article = $data;
    }

    public function handle()
    {
        $this->article->hay = 'we7de';
        $this->article->kamen = 'tenye';

        return $this->article;
    }
}
