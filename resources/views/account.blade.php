@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">


                          <div class="tabtab">
                          <h2 class="txt-contentsss">会計</h2>
                          <div class="accountancyy">



                                                  <!-- メッセージ入力 -->
                        		<h3 class="handmessage">手動メッセージ入力</h3>
                            <div class="message">
                        		<input v-model="message" placeholder="edit me">
                          </div>
                        		<p class="inputt">※伝票番号を入力できます。
                        		<br>
                        		※ニックネームを入力すると会費などの集計が楽になります。<br>
                        		※設定した固定メッセージも表示されます。<br>
                        		</p>
                            <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>
    <li class="list-item is-load" v-for="item in items" id="{{item.id}}">
    <div id="qr">
    <qr><img v-img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl={"v":2,"type":2,"data":{"addr":"NBZNQL2JDWTGUAW237PXV4SSXSPORY43GUSWGSB7","amount":1000000,"msg":"invoice","name":"Qiita XEM invoice"}}"></qr>
</div>
</li>




                        		<!-- メッセージ入力ここまで -->

                        		<!-- 合計金額入力 -->

                        			<h3 class="summ">合計金額を入力</h3>
                              <div class="suminput">
                              <input v-model.number="message" placeholder="edit me">
                        		</div>

                        		<div class="JPY">
                        			<p>JPY(USD)</p>
                        		</div>
                        		<!-- 合計金額入力ここまで-->
                            @if(isset($user))
                             <img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            @endif

                        		<!-- レート -->
                        		<h3>レート</h3>
                        		<div class="rate">
                        			<p>JPY(USD)/XEM</p>
                        		</div>

                        		<!-- レート -->
                        		<!-- 合計金額 -->
                        		<h3>支払金額</h3>
                        		<div class ="sum">
                        				<p>JPY(USD)</p>
                        				<p>XEM</p>
                        		</div>


                        		<!-- 合計金額ここまで -->

                        		<!-- QR -->
                        			<p>
                        				<input class="QR btn btn-primary-set" type="button" value="QRコードを発行する"  href="file:///Users/jintayamada/virtualpaywebpage/QR.html" onclick="tbox1()">
                        				<script type="text/javascript" src="QR.js">
                        				</script>
                        			</p>
                        	<!-- 戻る -->
                        	<div class="main">
                        			<a>
										<a href="/home"><input class="return btn btn-primary-set" type="button" value="トップページへ戻る"  ></a>
                        			</p>
                        	</div>
                        </body>
                        </html>
                        </div>

    </div>

@endsection
