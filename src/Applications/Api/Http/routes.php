<?php

$app->get('/t', function() use($app) {
});

$app->group(['namespace' => 'Sample\Applications\Api\Http\Controllers'], function ($app) {
    $app->get('/articles', 'ArticleController@index');
});
