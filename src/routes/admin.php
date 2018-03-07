<?php

Route::
    name('admin.')
    ->middleware(['web', 'lang'])
    ->prefix(config('superauth.admin_prefix'))
    ->group(function() {
    Route::get('login', 'Adam\Superauth\Controllers\Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::get('/', 'Adam\Superauth\Controllers\Admin\DashboardController@index')->name('dashboard')->middleware('moderators');
    Route::get('test', 'Adam\Superauth\Controllers\Admin\TestDashboardController@index')->name('test.dashboard')->middleware('moderators');
    Route::post('test', 'Adam\Superauth\Controllers\Admin\TestDashboardController@updateRoles')->name('roles.update')->middleware('auth');
});