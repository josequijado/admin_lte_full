<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')
    ->name('index');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')
    ->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')
    ->name('password.update');
// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')
    ->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')
    ->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')
    ->name('verification.resend');

// Una vez autenticado el usuario le deriva a la página princial de
// usuario o administrador, según proceda
Route::get('/select', 'MainController@select')
    ->name('select');

// Rutas de Administrador
Route::get('/main-admin', 'Admin\MainController@index')
    ->name('main_admin');

// Cambio de idioma
Route::post('/language-change', 'MainController@language_change')
    ->name('language_change');

