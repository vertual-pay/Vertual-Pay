@extends('layouts.app')

@section('content')
<h1>決済履歴</h1>
@for ($i = 0; $i < 10; $i++)
    <b>XEM料金</b><p>{{$result["data"][$i]["transaction"]["amount"]}}</p>
    <b>決済時間</b>
    <?php $timestamp = $result["data"][$i]["transaction"]["timeStamp"] + 1427555185 ?>
    <p><?php echo date( "Y年 m月d日 h時m分s秒",$timestamp) ?></p>
    <?php $publib_key = $result["data"][$i]["transaction"]["signer"];
          $base_url = 'http://go.nem.ninja:7890/account/get/from-public-key?publicKey=';
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $base_url.$publib_key);
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $address = json_decode($response, JSON_PRETTY_PRINT);?>
    <b>送金した公開鍵</b><p>{{$address["account"]["address"]}}</p>
@endfor


@endsection
