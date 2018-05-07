@extends('layouts.app')

@section('content')

<!--phpで変数持ってきた-->
@if(isset($result))
<h1 class="history-name">取引履歴</h1>
<div class ="table-body">
<table border="2" class="table1">
    <tr>
      <th>日時</th>
      <th>アドレス</th>
      <th>XEM</th>
    </tr>
  </table>
</div>
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
      $address = json_decode($response, JSON_PRETTY_PRINT);
      ?>
      <div class ="table-body">
<table border="2" class="table1">
<tr>
    <td><?php echo date( "Y年 m月d日 h時m分s秒",$timestamp) ?></td>
    <td>{{$address["account"]["address"]}}</td>
    <td>{{$result["data"][$i]["transaction"]["amount"]}}</td>
  </tr>
  </table>
</div>
@endfor
  <a href="/home"><input class="return btn btn-primary-set" type="button" value="トップページへ戻る" ></a>
  @else
  <h1>決済処理がされておりません</h1>
  @endif



@endsection
