@extends('layouts.app')

@section('content')

    <div class="justify-content-center">



          <form method="POST" action="{{action('HomeController@qrcode')}}" accept-charset="UTF-8">
{{ csrf_field() }}
                           <div class="tabtabtab">
  <h2 class="txt-contentsss">会計</h2>

    <div class="message">
    <h3>伝票番号を入力してください</h3>
      <input name="account_number" id="account_number">
  </div>
            <div class="justify-content-center">
                        <div class="summ">
                            <h3>合計金額を入力してください</h3>
                        		<input name="amount" id="amount"><p>円<p>
            </div>
@if(isset($data))
                        		<!-- レート -->
                        		<div class="raterate">
                              <h3></h3>
                        		<div class="rate">
                        			<p>レート <?php echo round($rate,2)?>JPY(USD)/XEM</p>
                            <p>アドレス {{$data->address}}</p>
                        		</div>
                                <div onclick="confirm()"><input type="submit" value="QRコードを発行する"></div>
                                <!-- Javascriptで確認 -->
                              <script type="text/javascript">
                        function confirm(){
                          amount = document.getElementById("amount").value;
                          console.log(amount);
                          if(amount.value != null)
                  window.alert('QR発行に行こうします。')
                              }
                              else{
                                window.alert('あかんデェ');
                              }
                              </script>

@else
                  <a href="/config/sigup"><h3 style="color:black; font-size:25px;"> 設定ページでXEMアドレスを設定してください</h3></a>
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
