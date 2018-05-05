@extends('layouts.app')

@section('content')
<!--phpで変数持ってきた-->
<h1>決済履歴</h1>
@for ($i = 0; $i < 10; $i++)
<?php $timestamp = $result["data"][$i]["transaction"]["timeStamp"] + 1427555185;
      $public_key = $result["data"][$i]["transaction"]["signer"];
      $base_url = 'http://go.nem.ninja:7890/account/get/from-public-key?publicKey=';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $base_url.$public_key);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $address = json_decode($response, JSON_PRETTY_PRINT);?>

<table border="2">
    <tr>
      <th>XEM料金</th>
      <th>決済時間</th>
      <th>送金した公開鍵</th>
      <th>メッセージ(固定メッセージ,当時のレート、伝票番号など)<th>
    </tr>
<tr>
    <td>{{$result["data"][$i]["transaction"]["amount"]}}</td>
    <td><?php echo date( "Y年 m月d日 h時m分s秒",$timestamp) ?></td>
    <td>{{$address["account"]["address"]}}</td>
    <td>{{$result["data"][$i]["transaction"]["signature"]}}
  </tr>
  </table>
@endfor


@endsection
