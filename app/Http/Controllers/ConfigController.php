<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Config;


class ConfigController extends Controller
{
  public function getSignup(){
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
 'password' => 'required|min:4'
 ]);

 //DBインサート
 $id = Auth::id();
 $address = $request->address;
 $password = $request->config_password;

 $config = new Config(['address' => $address, 'user_id' => $id, 'config_password' => $password]);
 $config->save();

 return view('/config', compact('address'));
 }
}
