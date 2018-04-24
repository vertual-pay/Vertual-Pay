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

 return view('config.profile');
}

 }

 public function updateProfile(Request $request)
 {
   //ユーザパスワードの変更
   $id = Auth::id();
     $data = Config::where('user_id', $id )->first();
     $address = $data->address;

   if(isset($request->password)){
     User::find($id)->update(['password' => $request->password]);
   }
   //ユーザメールのパスワード
   if(isset($request->email)){
     User::find($id)->update(['email' => $request->email]);
   }
   return view('config.profile',compact('address'));
 }

 public function getProfile()
 {
   //アドレスとパスワード
   $id = Auth::id();
   $data = Config::where('user_id', $id )->first();
   $address = $data->address;

   return view('config.profile',compact('address'));
 }
}
