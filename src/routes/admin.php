<?php
Route::group(['prefix' => 'admin',  'middleware' => ['web']], function()
{
    Route::get('login', 'Adam\Superauth\Controllers\Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::group(['middleware' => ['moderators']], function()
    {
        Route::get('/', 'Adam\Superauth\Controllers\Admin\DashboardController@index')->name('admin.dashboard');

    });
    Route::post('/', 'Adam\Superauth\Controllers\Admin\DashboardController@updateRoles')->name('roles.update');
});