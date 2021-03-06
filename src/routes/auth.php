<?php
Route::group(['middleware' => ['web', 'lang']], function() {
    // Authentication Routes...
    Route::get('login', 'Adam\Superauth\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Adam\Superauth\Controllers\Auth\LoginController@login');
    Route::post('logout', 'Adam\Superauth\Controllers\Auth\LoginController@logout')->name('logout');

    Route::prefix(config('superauth.admin_prefix'))
        ->group(function() {
            Route::post('lock', 'Adam\Superauth\Controllers\Auth\LoginController@lock')->name('lock');
            Route::get('lock/{user}', 'Adam\Superauth\Controllers\Auth\LoginController@lockScreen')->name('lock.screen');
        });

    // Registration Routes...
    Route::get('register', 'Adam\Superauth\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Adam\Superauth\Controllers\Auth\RegisterController@register');
    Route::get('register/confirm/{id}', 'Adam\Superauth\Controllers\Auth\ConfirmController@index')->name('confirm.email');
    Route::post('register/confirm', 'Adam\Superauth\Controllers\Auth\ConfirmController@resendConfirm')->name('confirm.resend');
    Route::get('register/confirm_email/{confirm_token}', 'Adam\Superauth\Controllers\Auth\ConfirmController@confirmEmail')->name('confirm.token');

    // Password Reset Routes...
    Route::get('password/reset', 'Adam\Superauth\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Adam\Superauth\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Adam\Superauth\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Adam\Superauth\Controllers\Auth\ResetPasswordController@reset');
    Route::get('/test/profile', 'Adam\Superauth\Controllers\TestProfileController@index')->name('test.profile');
    Route::get('/profile', 'Adam\Superauth\Controllers\ProfileController@index')->name('profile');
});