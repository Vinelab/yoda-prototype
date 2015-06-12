<?php

namespace Sample\Applications\Cms\Http\Controllers;

use Sample\Applications\Cms\Features\CreateNewArticle;
use Sample\Applications\Cms\Features\DisplayCreateNewArticleForm;
use Sample\Applications\Cms\Features\StoreNewArticle;
use Sample\Foundation\Http\Controllers\Controller;

/**
 * Class ArticleController
 *
 * @category Controller
 * @package Sample\Applications\Cms\Http\Controllers
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class ArticleController extends Controller
{

    /**
     * @return mixed
     */
    public function displayCreateNewArticleForm()
    {
        return $this->dispatch(new DisplayCreateNewArticleForm());
    }

    /**
     * @return mixed
     */
    public function storeNewArticle()
    {
        dd('aaaa');
        return $this->dispatch(new StoreNewArticle());
    }
}
