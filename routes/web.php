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


Route::get('/', 'App\Http\Controllers\UserController@getSignUp')->name('register');
Route::get('/dashboard', 'App\Http\Controllers\PostController@dashboard')->name('dashboard');
Route::post('/signup', 'App\Http\Controllers\UserController@postSignUp')->name('signup');
Route::post('/signin', 'App\Http\Controllers\UserController@postSignIn')->name('signin');
Route::get('/get_signin', 'App\Http\Controllers\UserController@getSignIn')->name('get_signin');
Route::get('logout', '\App\Http\Controllers\UserController@getLogout')->name('logout');
Route::post('/postcreate', 'App\Http\Controllers\PostController@postCreatePost')->name('postcreate');
