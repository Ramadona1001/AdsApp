<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Ads\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::prefix("ads")->group(function () {
            Route::get('/all', 'AdsController@index')->name('ads');
            Route::get('/create', 'AdsController@create')->name('create_ads');
            Route::post('/store', 'AdsController@store')->name('store_ads');
            Route::get('/edit/{id}', 'AdsController@edit')->name('edit_ads');
            Route::post('/update/{id}', 'AdsController@update')->name('update_ads');
            Route::get('/show/{id}', 'AdsController@show')->name('show_ads');
            Route::get('/delete/{id}', 'AdsController@destroy')->name('destroy_ads');
            Route::post('/upload', 'AdsController@upload')->name('upload_ads');
        });
    });
});
