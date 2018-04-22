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
Route::get('/register/verify/{token}', 'Auth\RegisterController@verify');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account', 'HomeController@account');
Route::get('/history', 'HomeController@history');
Route::get('/config', 'HomeController@config');
Route::update('/config', 'HomeController@config');
Route::get('/qr', 'HomeController@qr');
