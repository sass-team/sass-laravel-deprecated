<?php

use App\Http\Controllers\Auth\AuthController;


Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['as' => 'marketing_page', function () {
        return 'welcome page';
    }]);

    // not implemented
    Route::get('dashboard', ['as' => 'dashboard_path', 'uses' => 'Auth\AuthController@getLogin']);
    Route::get('appointments/calendar', ['as' => 'dashboard_path', 'uses' => 'Auth\AuthController@getLogin']);
    Route::resource('appointments', AuthController::class);
    Route::resource('staff', AuthController::class);
});

Route::group(['middleware' => ['api'], 'prefix' => 'api'], function () {
    Route::any('{any}', ['as' => 'api.exception.not_found', 'uses' => 'Api\ExceptionsController@notFound'])
        ->where('any', '(.*)?');
});

Route::any('{any}', ['as' => 'exception.not_found', 'uses' => 'ExceptionsController@notFound'])
    ->where('any', '(.*)?');
