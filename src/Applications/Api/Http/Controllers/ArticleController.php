<?php

namespace Sample\Applications\Api\Http\Controllers;

use Sample\Foundation\Http\Controllers\Controller;
use Sample\Applications\Api\Features\ListPublishedArticlesFeature;

/**
 * Class ArticleController
 *
 * @category Controller
 * @package Sample\Applications\Api\Http\Controllers
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class ArticleController extends Controller
{
    public function index()
    {
        return $this->dispatch(new ListPublishedArticlesFeature());
    }
}
