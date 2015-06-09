<?php

namespace Sample\Applications\Api\Http\Controllers;

use Sample\Foundation\Http\Controllers\Controller;
use Sample\Applications\Api\UserCases\ListPublishedArticles;

class ArticleController extends Controller
{
    public function index()
    {
        return $this->dispatch(new ListPublishedArticlesOperation());
    }
}
