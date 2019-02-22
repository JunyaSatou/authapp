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

Route::get('/', function () {
    return view('welcome');
});

// http://www.authapp.test/login のルーティング
Route::get('/login', 'AuthAppController@index');
Route::post('/login', 'AuthAppController@auth_check');
Route::post('/logout', 'AuthAppController@logout');

