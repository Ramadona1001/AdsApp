<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Tags\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::prefix("tags")->group(function () {
            Route::get('/all', 'TagsController@index')->name('tags');
            Route::get('/create', 'TagsController@create')->name('create_tags');
            Route::post('/store', 'TagsController@store')->name('store_tags');
            Route::get('/edit/{id}', 'TagsController@edit')->name('edit_tags');
            Route::post('/update/{id}', 'TagsController@update')->name('update_tags');
            Route::get('/show/{id}', 'TagsController@show')->name('show_tags');
            Route::get('/delete/{id}', 'TagsController@destroy')->name('destroy_tags');
        });
    });
});
