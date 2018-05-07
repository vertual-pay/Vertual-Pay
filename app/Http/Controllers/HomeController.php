<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Config;
use \App\User;
use Base32\Base32;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //トップページ
    public function index()
    {
      $id = Auth::id();
      $exist = Config::where('user_id', $id)->exists();
        return view('home',compact('exist'));
    }
//会計処理
    public function account()
    {
      $user = Auth::user();
      //
      $data = Config::where('user_id', $user->id)->first();


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
      return view('account',compact('data', 'rate','price_jpy','user','qr_json'));
    }
//決済履歴
    public function history()
    {
      $id = Auth::id();
      $data = Config::where('user_id', $id)->first();
      $address = $data->address;

      $base_url = 'http://go.nem.ninja:7890/account/transfers/incoming?address=';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $base_url.$address);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $result = json_decode($response, JSON_PRETTY_PRINT);


  if(empty($result["data"])){
    return view('history');
  }
  else{
        return view('history',compact('result'));
      }

    }
//QRコード発行

    public function qrcode(Request $request)
    {

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
        // XEMを6倍する
        $amount = $request->amount *  1000000;

      $user = Auth::user();
      $data = Config::where('user_id', $user->id)->first();
      $qr_json = array("v" => 2 ,"type" => 2, "data" => array("addr" => $data->address, "amount" => $amount, "msg" => "お店の名前".$user->name."からメッセージ".$data->message."伝票番号".$request->pay."当時のレート番号".$rate, "name" => "Vertual-Pay") );
      $qr_json = json_encode($qr_json);

      return view('/account',compact('data', 'rate','price_jpy','user','qr_json'));
    }

}
