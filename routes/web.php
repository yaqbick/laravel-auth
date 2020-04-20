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

Route::get('/login','AuthController@login')->name('login');
Route::get('/register','AuthController@register')->name('register');
Route::post('/register','AuthController@store');
Route::post('/login','AuthController@authenticate');
Route::get('/getAddress','MailController@getAddress')->name('getAddress');
Route::post('/sendEmail','MailController@send')->name('sendEmail');
Route::get('/reset-password','AuthController@resetPassword');
Route::post('/reset-password','AuthController@updatePassword');