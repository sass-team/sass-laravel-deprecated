<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
});

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
    Route::any('{any}', ['as' => 'api.exception.not_found', 'uses' => 'Api\ExceptionsController@notFound'])
        ->where('any', '(.*)?');
});
