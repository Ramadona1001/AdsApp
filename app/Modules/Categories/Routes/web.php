<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Categories\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::prefix("categories")->group(function () {
            Route::get('/all', 'CategoriesController@index')->name('categories');
            Route::get('/create', 'CategoriesController@create')->name('create_categories');
            Route::post('/store', 'CategoriesController@store')->name('store_categories');
            Route::get('/edit/{id}', 'CategoriesController@edit')->name('edit_categories');
            Route::post('/update/{id}', 'CategoriesController@update')->name('update_categories');
            Route::get('/show/{id}', 'CategoriesController@show')->name('show_categories');
            Route::get('/delete/{id}', 'CategoriesController@destroy')->name('destroy_categories');
            Route::post('/upload', 'CategoriesController@upload')->name('upload_categories');
        });
    });
});
