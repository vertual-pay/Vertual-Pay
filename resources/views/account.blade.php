@extends('layouts.app')

@section('content')

    <div class="justify-content-center">


          {{Form::open(array('action' => 'HomeController@qrcode', 'method' => 'post'))}}

                          <div class="tabtabtab">
                            <h2 class="txt-contentsss">会計</h2>



<div class="message">
                                                  <!-- メッセージ入力 -->
                        		<h3>伝票番号を入力してください</h3>

                        		<input class="numbermesssage" name="pay" method="get">
                            <p class="input">
                            ※設定した固定メッセージも表示されます。
                          </p>
                          </div>





                        		<!-- メッセージ入力ここまで -->
                            <div class="justify-content-center">
                        		<!-- 合計金額入力 -->
                            <div class="summ">
                            <h3>合計金額を入力してください</h3>
<<<<<<< HEAD
                        		<input name="amount"><p>XEM<p></div>

=======
                        		<input name="amount">円
　　　　　　　　　　　　　　　　　　</div>
>>>>>>> 11a19d1e2fdf9563e7a338fba8f337d9bc47a661



                        		<!-- 合計金額入力ここまで-->
                 @if(isset($data))
                        		<!-- レート -->
                        		<h3>レート
                        		<div class="rate">
                        			<p>JPY(USD)/XEM<?php echo round($rate,2)?></p>
                            <p>アドレス
                              {{$data->address}}</p>
                        		</div>
                                {{Form::submit('QRコードを発行する')}}
                @else
                <h3 style="color:black; font-size:25px;"> 設定ページでXEMアドレスを設定してください</h3>
                @endif
                        		<!-- レート -->
                        		<!-- 合計金額 -->

  <h3>支払金額</h3>
                        		<div class ="sum">

                        				<p>JPY(USD)<?php echo round($price_jpy,2)?></p>
                        				<p>XEM</p>
                        		</div>
                        		<!-- 合計金額ここまで -->
                        		<!-- QR -->
                            @if(isset($qr_json))
                          {!!QrCode::size(300)->generate($qr_json);!!}
                          <img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-left:25px;">
                         {{$user->name}}の会計
                          @endif
                          {{Form::close()}}

                        	<!-- 戻る -->
                        	<div class="main">
									<a href="/home"><input class="returnn btn btn-primary-set" type="button" value="トップページへ戻る"></a>
                        	</div>
                        </body>
                        </div>
</div>

  </div>


@endsection
