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


Route::resource('post', 'PostController');
Route::resource('user', 'UserController');
Route::get('post/my/{id}', 'PostController@my')->name('my');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


