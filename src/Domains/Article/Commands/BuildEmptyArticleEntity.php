<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Entities\Article;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * return the empty entity
 *
 * @category
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class BuildEmptyArticleEntity extends Command implements SelfHandling
{

    /**
     * @param        $data
     * @param string $title
     */
    public function __construct($data, $title = 'default')
    {
        $this->query = $data;
        $this->title = $title;
    }

    /**
     * @param \Sample\Domains\Article\Entities\Article $article
     *
     * @return \Sample\Domains\Article\Entities\Article
     */
    public function handle(Article $article)
    {
//        dd($this->title);
        return $article;
    }
}
