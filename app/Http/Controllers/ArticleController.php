<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operations\Articles\ListPublishedArticlesOperation;
use App\Operations\Articles\DisplayCreateArticleFormOperation;

class ArticleController extends Controller
{
    public function index()
    {
        return $this->dispatch(new ListPublishedArticlesOperation());
    }

    public function create(Request $request)
    {
        return $this->dispatch(new DisplayCreateArticleFormOperation($request));
    }

    public function store()
    {
        return $this->dispatch(new StoreArticleOperation($request));
    }
}
