<?php

use Illuminate\Support\Facades\Route;

$namespace = "Api\Controllers";
Route::namespace($namespace)->group(function () {
    Route::prefix("api/categories")->group(function () {
        Route::get('/all', 'CategoriesController@index')->name('categories_api');
        Route::post('/store', 'CategoriesController@store')->name('store_categories_api');
        Route::post('/update/{id}', 'CategoriesController@update')->name('update_categories_api');
        Route::get('/show/{id}', 'CategoriesController@show')->name('show_categories_api');
        Route::get('/delete/{id}', 'CategoriesController@destroy')->name('destroy_categories_api');
    });

    Route::prefix("api/tags")->group(function () {
        Route::get('/all', 'TagsController@index')->name('tags_api');
        Route::post('/store', 'TagsController@store')->name('store_tags_api');
        Route::post('/update/{id}', 'TagsController@update')->name('update_tags_api');
        Route::get('/show/{id}', 'TagsController@show')->name('show_tags_api');
        Route::get('/delete/{id}', 'TagsController@destroy')->name('destroy_tags_api');
    });

    Route::prefix("api/ads")->group(function () {
        Route::get('/filter', 'AdsController@filter')->name('filter_api');
        Route::get('/advertiser/{id}', 'AdsController@advertiser')->name('advertiser_api');
    });
});


