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
        return view('home');
    }
//会計処理
    public function account()
    {
      $user = Auth::user();
      return view('account',compact('user'));
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

        return view('history',compact('result'));

    }
    public function qr()
    {
      return view('qr');
    }
    public function other()
    {
      return view('other');
    }
}
