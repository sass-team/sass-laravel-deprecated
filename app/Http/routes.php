<?php

$this->group(['middleware' => 'web'], function () {
    $this->group(['middleware' => 'auth'], function () {
        $this->get('dashboard', ['as' => 'dashboard_path', 'uses' => 'DashboardController@index']);
//        $this->get('appointments/calendar', ['as' => 'appointments.calendar', 'uses' => 'Auth\AuthController@getLogin']);
//        $this->resource('appointments', 'Auth\AuthController');
//        $this->resource('staff', 'Auth\AuthController');
    });

    $this->get('/', ['as' => 'landing_page', 'uses' => 'LandingPagesController@getActive']);

    // Authentication Routes...
    $this->get('login', ['as' => 'login.get', 'uses' => 'Auth\AuthController@getLogin']);
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');
});

$this->group(['middleware' => 'api', 'prefix' => 'api'], function () {
    $this->group(['prefix' => 'v1'], function () {
        $this->post('login', ['as' => 'api.v1.auth.login', 'uses' => 'Api\V1\AuthController@postLogin']);

        $this->group(['middleware' => 'api.v1.auth'], function () {
        });

        $this->any('400', ['as' => 'api.exception.not_found', 'uses' => 'Api\ExceptionsController@notFound'])
            ->where('any', '(.*)?');
    });

    $this->any('{any}', ['as' => 'api.exception.not_found', 'uses' => 'Api\ExceptionsController@notFound'])
        ->where('any', '(.*)?');
});

// 404
$this->any('{any}', ['as' => 'exception.not_found', 'uses' => 'ExceptionsController@notFound'])
    ->where('any', '(.*)?');
