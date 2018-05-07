@extends('layouts.app')

@section('content')

    <div class="justify-content-center">



          <form method="POST" action="{{action('HomeController@qrcode')}}" accept-charset="UTF-8">
{{ csrf_field() }}
                           <div class="tabtabtab">
  <h2 class="txt-contentsss">会計</h2>



                           <div class="message">
                            <!-- メッセージ入力 -->
    <h3>伝票番号を入力してください</h3>
      <input class="numbermesssage" name="pay" id="pay">
<p class="input">
  ※設定した固定メッセージも表示されます。
</p></div>
            <div class="justify-content-center">
                        <div class="summ">
                            <h3>合計金額を入力してください</h3>
                        		<input name="amount" id="amount"><p>XEM<p>
            </div>
@if(isset($data))
                        		<!-- レート -->
                        		<div class="raterate">
                              <h3></h3>
                        		<div class="rate">
                        			<p>レート <?php echo round($rate,2)?>JPY(USD)/XEM</p>
                            <p>アドレス {{$data->address}}</p>
                        		</div>
                                <input type="submit" value="QRコードを発行する" onclick="confirm()">
                              <script type="text/javascript">

                              function confirm(){
                                var pay = getElementById('pay').value;
                                var amount = getElementById('amount').value;

                                pay = Number(pay);
                                amount = Number(pay);

                                alert("伝票番号:"+ pay + "\n支払い金額"　+ amount);
                              }
                              </script>
@else
                <h3 style="color:black; font-size:25px;"> 設定ページでXEMアドレスを設定してください</h3>
@endif
              </div>
              @csrf
            </form>
<div class="sumsum">
  <h3>支払金額</h3>
<p>
  JPY(USD)<?php echo round($price_jpy,2)?>
</p>
<p>XEM</p>
       </div>
      <div class="main">
			<a href="/home"><input class="returnn btn btn-primary-set" type="button" value="トップページへ戻る"></a>
    </div>
  </div>
 </div>
</div>


@endsection
