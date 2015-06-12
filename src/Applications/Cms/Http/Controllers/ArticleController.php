<?php

namespace Sample\Applications\Cms\Http\Controllers;

use Sample\Applications\Cms\Features\CreateNewArticle;
use Sample\Applications\Cms\Features\DisplayCreateNewArticleFormFeature;
use Sample\Applications\Cms\Features\StoreNewArticleFeature;
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
        return $this->dispatch(new DisplayCreateNewArticleFormFeature());
    }

    /**
     * @return mixed
     */
    public function storeNewArticle()
    {

        return $this->dispatch(new StoreNewArticleFeature());
    }
}
