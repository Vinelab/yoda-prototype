<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Operations\Article\FetchArticlesOperation;
use App\Operations\Article\DisplayCreateArticleFormOperation;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        return $this->dispatch(new FetchArticlesOperation($request));
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
