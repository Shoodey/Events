<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'DashboardController@index');

    Route::get('lock', ['as' => 'lock', 'uses' => 'Auth\AuthController@lock']);
    Route::post('lock', ['as' => 'lock', 'uses' => 'Auth\AuthController@lockPost']);

    Route::auth();

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');
    });
});
