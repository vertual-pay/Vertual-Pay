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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/main/index', 'MainController@index');
Route::get('/rule', 'HomeController@rule');
Route::get('/main/balance', 'MainController@balance');
Route::get('/main/config', 'MainController@config');
Route::match(['get','put'], '/main/config_update', 'MainController@config_update');
Route::get('/main/other', 'MainController@other');
Route::get('/main/history', 'MainController@history');
