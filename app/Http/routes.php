<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'DashboardController@index');

    // add 'middleware' => ['role:admin']
    Route::get('activate/{id}/{token}', ['as' => 'activate', 'uses' => 'Auth\AuthController@activate']);

    Route::get('lock', ['as' => 'lock', 'uses' => 'Auth\AuthController@lock']);
    Route::post('lock', ['uses' => 'Auth\AuthController@lockPost']);

    Route::auth();

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('roles', 'RolesController');
    });
});
