<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * return the empty entity
 *
 * @category Command
 * @package  Sample\Domains\Article\Commands
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class AttachPhotosToArticleCommand extends Command implements SelfHandling
{

    public function handle()
    {
        $photosCollection = $this->get('photosCollection');
        $article = $this->get('article');

        $article->setRelation('photos', $photosCollection);

        $this->get('article', $article);
    }

}
