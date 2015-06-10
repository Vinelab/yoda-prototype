<?php

$app->group([
    'namespace' => 'Sample\Applications\Api\Http\Controllers',
    'domain'    => 'api.sample.dev'
], function ($app) {
    $app->get('/articles', 'ArticleController@index');
});
