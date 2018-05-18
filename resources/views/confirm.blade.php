@extends('layouts.app')

@section('content')

<h1>決済履歴</h1>
<h2>直近で決済された過去3回の決済が表示されます。</h2>
@for ($i = 0; $i < 3; $i++)
<?php $timestamp = $result["data"][$i]["transaction"]["timeStamp"] + 1427555185;
      $public_key = $result["data"][$i]["transaction"]["signer"];
      $base_url = 'http://go.nem.ninja:7890/account/get/from-public-key?publicKey=';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $base_url.$public_key);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $address = json_decode($response, JSON_PRETTY_PRINT);

      ?>
      <div class ="table-body">
<table border="2" class="table1">
<tr>
    <td style="width: 15%;" ><?php echo date( "Y年 m月d日 h時m分s秒",$timestamp) ?></td>
    <td style="width: 23%;">{{$address["account"]["address"]}}</td>
    <td style="width: 7%;"><?php echo $result["data"][$i]["transaction"]["amount"] * 0.000001 ?></td>
    <td style="font-size:12px;"><?php
     if(!empty($result["data"][$i]["transaction"]["message"])){
       $type = $result["data"][$i]["transaction"]["message"]["type"];
       $message = $result["data"][$i]["transaction"]["message"]["payload"];
       if($type == 1){
         echo hex2bin($message);
       }else{
         echo 'メッセージが暗号化されています';
       }
     }else
     {
       echo 'メッセージがありません';
     }
  ?></td>
  </tr>
  </table>
  <a href="/home"><input class="return-confirm  btn-primary-confirm" type="button" value="トップページへ戻る"></a>
</div>
@endfor
@endsection
