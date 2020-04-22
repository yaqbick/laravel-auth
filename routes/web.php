<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::prefix('auth')->group(function () {
Route::get('/login','AuthController@loginForm')->name('loginForm');
Route::get('/register','AuthController@registerForm')->name('registerForm');
Route::post('/register','AuthController@register')->name('register');
Route::post('/login','AuthController@login')->name('login');;
Route::get('/getAddress','MailController@getAddress')->name('getAddress');
Route::post('/sendEmail','MailController@send')->name('sendEmail');
Route::get('/reset-password','AuthController@resetPasswordForm')->name('resetPasswordForm');
Route::post('/reset-password','AuthController@resetPassword')->name('resetPassword');
});