<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Config;
use \App\User;


class ConfigController extends Controller
{public function getSignup(){
      return View('config.signup');
   }

  public function postSignup(Request $request){
  // バリデーション
  $this->validate($request,[
    'config_password' => 'required|min:4',
    'address' => 'required'
  ]);

  // DBインサート
  $id = Auth::id();
  $address = $request->address;
  //公開鍵のハイフンを消す。
  $address = str_replace('-', '',$address);
  $password = $request->config_password;
  $config = new Config(['address' => $address, 'user_id' => $id, 'config_password' => $password]);
  $config->save();

  return view('config.profile', compact('address','password'));
}

    //ログイン
  public function getSignin()
    {
      return view('config.signin');
    }
//アドレスとログ
  public function postSignin(Request $request)
 {
 $this->validate($request,[
 'config_password' => 'required|min:4'
 ]);
//設定のパスワード取得
 $config_password = $request->config_password;

 //config_passwordのUserモデルを参照。
 $data = Config::where('config_password',$config_password)->first();
 $user_id = $data->user_id;

 $account = User::find($user_id)->first();
 $password = $account->password;

  //パスワードが存在しているか
 if($password){

     return redirect()->action('ConfigController@getProfile');
}

 }

 public function updateProfile(Request $request)
 {
   //ユーザパスワードの変更
   $id = Auth::id();
     $data = Config::where('user_id', $id )->first();

     $address = $data->address;
     //boolean,message,password,email,config_password,integer,

     return redirect()->action('ConfigController@getProfile');
 }

 public function getProfile()
 {
   //アドレスとパスワード
   $id = Auth::id();
   $data = Config::where('user_id', $id )->first();
   $address = $data->address;
   $message = $data->message;


   //APIレート
     $base_url =  'https://api.coinmarketcap.com/v1/ticker/nem/';
     $json = file_get_contents($base_url);
     $json = json_decode($json, JSON_PRETTY_PRINT);
     $price_usd = $json[0]["price_usd"];
  //日本円
     $japanese_json = file_get_contents('http://api.aoikujira.com/kawase/json/usd');
     $japanese_json = json_decode($japanese_json, JSON_PRETTY_PRINT);
     $price_jpy = $japanese_json["JPY"];

     //APIレート　* 日本円
     $rate = $price_jpy * $price_usd;


   return view('config.profile',compact('address','rate','message'));
 }
}
