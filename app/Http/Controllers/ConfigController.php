<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use \App\Config;
use \App\User;
use Image;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;



class ConfigController extends Controller
{public function getSignup(){

  return View('config.signup');
   }

  public function postSignup(Request $request){
  // バリデーション
  $this->validate($request,[
    'config_password' => 'required|min:4',
    'address' => 'required|alpha_dash|between:40,46'
  ]);

  //XEMアドレスがNでなければ、また登録ページに戻す
  if(!starts_with($request->address, 'N'))
  {
    $request()->session()->flash('message', '正しいXEMアドレスの形式ではありません。');

    return redirect('config.signup');
  }
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
  $true = Config::where('config_password', $request->config_password)->exists();

  if(!empty($true)){
    return redirect()->action('ConfigController@getProfile');
  }
 else {
     $id = Auth::id();
     $exist= Config::where('user_id', $id)->exists();
     $login = 'パスワードが違います';
   return view('config.signin',compact('exist','login'));
  }
 }



 public function updateProfile(Request $request)
 {
     //User取得
     $user = Auth::user();
     $data = Config::where('user_id', $user->id)->first();
     //Userモデルの変更
     //お店の名前
     if(isset($request->name))$user->name = $request->name;
     if(isset($request->password)){$user->update(['password' => $request->password]);}
     if(isset($request->email))$user->email = $request->email;
     if($request->hasFile('avatar')){
       $avatar = $request->file('avatar');
       $filename = time() . '.' . $avatar->getClientOriginalExtension();
       Image::make($avatar)->resize(300, 300)->save(public_path('/avatars/' . $filename ));
       $user->avatar = $filename;
     }
     $user->save();
        if(isset($request->config_password))$data->config_password = $request->config_password;
        if(isset($request->message))$data->message = $request->message;
        if(isset($request->address))
        {$address = str_replace('-', '',$request->address);
        $data->address = $address;}
        if(isset($request->rate)){
          if($request->rate == "false"){
             $data->rate = false;
          }
          if($request->rate == "true"){
            $data->rate = true;
          }
        }
        if(isset($request->message_foruser))$data->message_foruser = $request->message_foruser;
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
 public function resetpass()
 {
   $user = Auth::user();
   \App\User::destroy($user->id);
   return redirect('register');
 }

 public function getimg()
 {
   //User取得
   $user = Auth::user();
   $data = Config::where('user_id', $user->id)->first();
   return view('config.imgconfig', compact('data'));
 }
 public function postimg(Request $request)
 {
   //User取得
   $user = Auth::user();
   $data = Config::where('user_id', $user->id)->first();

   $data->image_frame = $request->image;
   $data->save();
   return redirect()->action('ConfigController@getProfile');
 }
}
