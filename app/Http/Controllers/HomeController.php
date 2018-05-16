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
        $fix_rate = $price_jpy * $price_usd;
        return view('account',compact('data', 'fix_rate','price_jpy','user','qr_json'));

    }
//決済履歴
    public function history()
    {
 //ユーザー情報取得
      $user = Auth::user();
      $data = Config::where('user_id', $user->id)->first();
      $address = $data->address;
//アドレスから、APIを叩く
      $base_url = 'http://go.nem.ninja:7890/account/transfers/incoming?address=';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $base_url.$address);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $result = json_decode($response, JSON_PRETTY_PRINT);


  //決済処理を行なっていない場合、APIを取ってこれないので、そのエラーに対処するため条件分岐した。
  if(empty($result["data"])){
    return view('history');
  }
  else{
    return view('history',compact('result'));}
    }
//QRコード発行

    public function qrcode(Request $request)
    {
      //伝票番号
      $account_number = $request->account_number;
      //APIレート USD/XEM
      $base_url =  'https://api.coinmarketcap.com/v1/ticker/nem/';
      $json = file_get_contents($base_url);
      $json = json_decode($json, JSON_PRETTY_PRINT);
      $price_xem = $json[0]["price_usd"];


     //日本円  JPY/USD
      $japanese_json = file_get_contents('http://api.aoikujira.com/kawase/json/usd');
      $japanese_json = json_decode($japanese_json, JSON_PRETTY_PRINT);
      $price_jpy = $japanese_json["JPY"];

//支払うべき金額をリクエスト
      $amount = $request->amount;
//jpy/xemを算出 １円あたりのXEMの料金
      $rate =  $price_xem * $price_jpy;
      $rate = 1 / $rate;




       //支払う額をXEMの価格に換算する
      $xem_price = $amount * $rate;

       //ブロックチェーンに載せるときは、100000倍にしなければならない


      //ユーザー情報取得
      $user = Auth::user();
      $data = Config::where('user_id', $user->id)->first();
      //JSON構造に直す。
      $qr_json = array("v" => 2 ,"type" => 2, "data" => array("addr" => $data->address, "amount" => $xem_price * 1000000, "msg" =>
      $user->name."からメッセージ：  ".$data->message." 伝票番号：".$account_number." 代金:".$amount , "name" => "Vertual-Pay") );
      $qr_json = json_encode($qr_json);

      return view('qr',compact('data', 'amount','user','qr_json','account_number','send','rate'));
    }

//決済確認
    public function confirm()
    {  $user = Auth::user();
       $data = Config::where('user_id', $user->id)->first();
       $address = $data->address;

     //アドレスから、APIを叩く
       $base_url = 'http://go.nem.ninja:7890/account/transfers/incoming?address=';
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $base_url.$address);
       curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $response = curl_exec($curl);
       $result = json_decode($response, JSON_PRETTY_PRINT);


      return view('confirm',compact('result'));
    }

}
