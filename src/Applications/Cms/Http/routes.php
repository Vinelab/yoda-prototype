<?php

Route::group(['namespace' => 'Sample\Applications\Cms\Http\Controllers'], function() {
    Route::get('articles/create', 'ArticleController@create');
    Route::post('articles/store', 'ArticleController@store');
});
