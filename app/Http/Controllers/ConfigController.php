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

 $config_password = $request->config_password;

 //config_passwordのUserモデルを参照。
 $data = Config::where('config_password',$config_password)->first();
 $user_id = $data->user_id;

 $password = User::find($user_id)->first();
 $password = $password->password;

  //パスワードが存在しているか
 if(Auth::attempt(['password' => $password])){

 return redirect()->route('config.profile');
}
  return redirect()->route('config.profile');

 }

 public function updateProfile(Request $request)
 {
   $id = Auth::id();
   if(isset($request->password)){
     User::find($id)->update(['password' => $request->password]);
   }
   if(isset($request->email)){
     User::find($id)->update(['email' => $request->email]);
   }

 }

 public function getProfile()
 {
   $id = Auth::id();
   $data = Config::where('user_id', $id )->first();
   $address = $data->address;
   $password = $data->config_password;
   return view('config.profile', compact('address', 'password'));
 }
}
