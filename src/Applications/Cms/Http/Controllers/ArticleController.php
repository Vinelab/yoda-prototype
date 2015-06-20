<?php

namespace Sample\Applications\Cms\Http\Controllers;

use Sample\Foundation\Controller;
use Sample\Applications\Cms\Features\CreateNewArticleFeature;
use Sample\Applications\Cms\Features\DisplayNewArticleFormViewFeature;

class ArticleController extends Controller
{
    public function create()
    {
        return $this->dispatch(new DisplayNewArticleFormViewFeature());
    }

    public function store()
    {
        return $this->dispatch(new CreateNewArticleFeature());
    }
}
