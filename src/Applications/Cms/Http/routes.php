<?php

Route::group(['namespace' => 'Sample\Applications\Cms\Http\Controllers'], function() {
    Route::get('articles/create', [
        'as' => 'articles.create',
        'uses' => 'ArticleController@create',
    ]);

    Route::post('articles/store', [
        'as' => 'articles.store',
        'uses' => 'ArticleController@store',
    ]);
});
