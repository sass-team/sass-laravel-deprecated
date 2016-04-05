<?php

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth']], function () {
        // not implemented
        Route::get('dashboard', ['as' => 'dashboard_path', 'uses' => 'Auth\AuthController@getLogin']);
        Route::get('appointments/calendar', ['as' => 'dashboard_path', 'uses' => 'Auth\AuthController@getLogin']);
        Route::resource('appointments', 'Auth\AuthController');
        Route::resource('staff', 'Auth\AuthController');
    });

    Route::get('/', ['as' => 'marketing_page', function () {
        return view('welcome');
    }]);

    // Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');
});

// API
Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
    Route::any('{any}', ['as' => 'api.exception.not_found', 'uses' => 'Api\ExceptionsController@notFound'])
        ->where('any', '(.*)?');
});

// 404
//Route::any('{any}', ['as' => 'exception.not_found', 'uses' => 'ExceptionsController@notFound'])
//    ->where('any', '(.*)?');
