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

Route::get('/', 'WebController@index')->name('index');

Route::get('/info/', function () {
    phpinfo();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
