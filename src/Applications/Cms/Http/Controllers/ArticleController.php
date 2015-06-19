<?php

namespace Sample\Applications\Cms\Http\Controllers;

use Sample\Foundation\Controller;
use Sample\Applications\Cms\Features\CreateNewArticleFeature;

class ArticleController extends Controller
{
    public function store()
    {
        return $this->dispatch(new CreateNewArticleFeature());
    }
}
