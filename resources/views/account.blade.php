@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">


                          <div class="tabtab">
                          <h2 class="txt-contentsss">会計</h2>
                          <div class="accountancyy">



                                                  <!-- メッセージ入力 -->
                        		<h3 class="handmessage">伝票番号</h3>
                            <div class="message">
                        		<input name="message" placeholder="edit me" method="get">
                          </div>
                        		<p class="input">※伝票番号を入力できます。
                        		<br>
                        		※ニックネームを入力すると会費などの集計が楽になります。<br>
                        		※設定した固定メッセージも表示されます。<br>
                        		</p>
                            <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>


    @if (env('APP_DEBUG'))
           <script src="{{ asset('js/vue.js') }}"></script>
       @else
           <script src="{{ asset('js/vue.min.js') }}"></script>
       @endif





                        		<!-- メッセージ入力ここまで -->
                            <div class="row justify-content-center">
                              <?php

                                    $address = $data->address;
                                    $origin_message = $data->message;
                                    $rate = $data->rate_account;
                                    $qr_json = array('v' => 2 ,'type' => '2', 'data' => ["addr" => $address, 'amount' =>300000, 'msg' => $origin_message, 'name' => 'Vertual-Pay' ] );
                                    $qr_json = json_encode($qr_json);

                                    ?>
                        		<!-- 合計金額入力 -->
                        <div id="app">
                        			<h3 class="summ">合計金額を入力</h3>
                              <div class="suminput">
                              <input  placeholder="入金して欲しい金額を入力">
                        		</div>
                          </div>

                        		<div class="JPY">
                        			<p>JPY(USD)<?php echo round($price_jpy,2)?></p>
                        		</div>
                        		<!-- 合計金額入力ここまで-->
                            @if(isset($user))
                             <img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            @endif

                        		<!-- レート -->
                        		<h3>レート</h3>
                        		<div class="rate">
                        			<p>JPY(USD)/XEM<?php echo round($rate,2)?></p>
                            <h3>アドレス</h3>
                              <p>{{$address}}</p>
                        		</div>

                        		<!-- レート -->
                        		<!-- 合計金額 -->
                        		<h3>支払金額</h3>
                        		<div class ="sum">
                        				<p>JPY(USD)<?php echo round($price_jpy,2)?></p>
                        				<p>XEM</p>
                        		</div>


                        		<!-- 合計金額ここまで -->

                        		<!-- QR -->
                            <p>QRコードを発行する</p>
                          {!! QrCode::size(300)->generate($qr_json); !!}


      <qr><img v-img src="http://chart.apis.google.com/chart?chs=500x500&cht=qr&chl=".$qr_json style="width:150px; height: 150px;"></qr>

                        	<!-- 戻る -->
                        	<div class="main">

                        			<p>
									<!--<a href="/home"><input class="return btn btn-primary-set" type="button" value="トップページへ戻る"  ></a>-->
                        			</p>
                        	</div>
                        </body>
                        </html>
                        </div>

    </div>


@endsection
