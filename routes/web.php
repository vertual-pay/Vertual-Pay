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

//ログイン認証
Auth::routes();
//メール認証
Route::get('/register/verify/{token}', 'Auth\RegisterController@verify');
//トップページ
Route::get('/home', 'HomeController@index')->name('home');
//会計ページ
Route::get('/account', 'HomeController@account');
//決済履歴
Route::get('/history', 'HomeController@history');
//QRコード
Route::post('/qr', 'HomeController@qrcode');
//決済確認
Route::get('/confirm', 'HomeController@confirm');
//Reset
Route::get('/reset', 'ConfigController@resetpass')->name('reset');
//Imageconfig
Route::get('/imgconfig', 'ConfigController@getimg')->name('imgconfig');
Route::post('/imgconfig', 'ConfigController@postimg');


//その他ページ
Route::get('/other', function(){
  return view('other');
});
//設定ログイン
Route::get('/signin',[
  'uses' => 'ConfigController@getSignin',
  'as' => 'config.signin'
  ]);
Route::post('/signin',[
  'uses' => 'ConfigController@postSignin',
  'as' => 'config.signin'
  ]);
//設定登録
Route::group(['prefix' => 'config'], function() {

  Route::get('/signup',[
      'uses' => 'ConfigController@getSignup',
      'as' => 'config.signup'
    ]);

  Route::post('/signup',[
   'uses' => 'ConfigController@postSignup',
   'as' => 'config.signup'
   ]);
//設定ページ
  Route::get('/profile',[
      'uses' => 'ConfigController@getProfile',
      'as' => 'config.profile'
   ]);
  Route::post('/profile',[
      'uses' => 'ConfigController@updateProfile',
      'as' => 'config.profile'
   ]);
    //設定ログイン
    Route::get('/signin',[
        'uses' => 'ConfigController@getSignin',
        'as' => 'config.signin'
    ]);
    Route::post('/signin',[
        'uses' => 'ConfigController@postSignin',
        'as' => 'config.signin'
    ]);
    //Imageconfig
    Route::get('/imgconfig',[
        'uses' => 'ConfigController@getimg',
        'as' => 'config.imgconfig'
    ]);
    Route::post('/imgconfig',[
        'uses' => 'ConfigController@postimg',
        'as' => 'config.imgconfig'
    ]);

});
