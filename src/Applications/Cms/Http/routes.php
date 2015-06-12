<?php

$app->group([
    'namespace' => 'Sample\Applications\Cms\Http\Controllers',
    'domain'    => '*.cms.sample.*'
], function ($app) {
    $app->get('/articles/create', 'ArticleController@displayCreateNewArticleForm');
    $app->post('/articles/store', 'ArticleController@storeNewArticle');
});
