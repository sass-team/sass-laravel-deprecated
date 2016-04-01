<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
});

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
    Route::any('{any}', ['as' => 'api.exception.not_found', 'uses' => 'Api\ExceptionsController@notFound'])
        ->where('any', '(.*)?');
});

Route::any('{any}', ['as' => 'exception.not_found', 'uses' => 'ExceptionsController@notFound'])
    ->where('any', '(.*)?');
