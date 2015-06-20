<?php

namespace Sample\Domains\Article\Entities;

use Eloquent;
use Sample\Domains\Article\Parts\Slug;
use Sample\Domains\Article\Parts\Title;
use Sample\Domains\Article\Parts\Content;
use Sample\Domains\Author\Entities\Author;
use Sample\Domains\Photo\Entities\Photo as Cover;
use Sample\Domains\Photo\PhotosCollection as Photos;

class Article extends Eloquent
{
    public static function post(Title $title, Slug $slug, Content $content, Author $author, Photos $photos, Cover $cover)
    {
        $article = new static();

        $article->title = (string) $title;
        $article->slug  = (string) $slug;
        $article->content  = (string) $content;

        $article->setRelation('cover', $cover);
        $article->setRelation('author', $author);
        $article->setRelation('photos', $photos);

        return $article;
    }
}
