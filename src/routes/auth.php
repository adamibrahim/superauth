<?php
Route::group(['middleware' => ['web']], function() {
    // Authentication Routes...
    Route::get('login', 'Adam\Superauth\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Adam\Superauth\Controllers\Auth\LoginController@login');
    Route::post('logout', 'Adam\Superauth\Controllers\Auth\LoginController@logout')->name('logout');

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
    Route::get('/profile', 'Adam\Superauth\Controllers\ProfileController@index')->name('profile');
});