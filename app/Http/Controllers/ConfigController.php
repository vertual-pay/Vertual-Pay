<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use \App\Config;
use \App\User;
use Image;


class ConfigController extends Controller
{public function getSignup(){

  return View('config.signup');
   }

  public function postSignup(Request $request){
  // バリデーション
  $this->validate($request,[
    'config_password' => 'required|min:4',
    'address' => 'required|alpha_dash'
  ]);
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
  // DBインサート
  $user = Auth::user();
  $address = $request->address;
  //設定モデル
  $config= Config::where('user_id', $user->id)->first();

  //公開鍵のハイフンを消す。
  $address = str_replace('-', '',$address);
  $password = $request->config_password;
  $config = new Config(['address' => $address, 'user_id' => $user->id, 'config_password' => $password]);
  $config->save();
  return view('config.profile',compact('config','user','rate'));

}

    //ログイン
  public function getSignin()
    {
      $id = Auth::id();
      $exist= Config::where('user_id', $id)->exists();

      return view('config.signin',compact('exist'));
    }
//アドレスとログ
  public function postSignin(Request $request)
 {

 $this->validate($request,[
 'config_password' => 'required|min:4'
 ]  );
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
     //User取得
     $user = Auth::user();
     $data = Config::where('user_id', $user->id)->first();
     //Userモデルの変更
     //お店の名前
     if(isset($request->name)){$user->password(['name' => $request->name]);}
     if(isset($request->password)){$user->update(['password' => $request->password]);}
     if(isset($request->email)){$user->update(['email' => $request->email]);}
     if($request->hasFile('avatar')){
       $avatar = $request->file('avatar');
       $filename = time() . '.' . $avatar->getClientOriginalExtension();
       Image::make($avatar)->resize(300, 300)->save(public_path('/avatars/' . $filename ));
       $user->avatar = $filename;
       $user->save();
     }
        if(isset($request->config_password))$data->config_password = $request->config_password;
        if(isset($request->message))$data->message = $request->message;
        if(isset($request->address))
        $address = str_replace('-', '',$request->address);
        $data->address = $request->address;
        if(isset($request->rate_account))$data->rate_account = $request->rate_account;
        $data->save();

     return redirect()->action('ConfigController@getProfile');
 }

 public function getProfile()
 {

   //アドレスとパスワード
   $user = Auth::user();
   $config = Config::where('user_id', $user->id)->first();


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

   return view('config.profile',compact('config','rate','user'));
 }
}
