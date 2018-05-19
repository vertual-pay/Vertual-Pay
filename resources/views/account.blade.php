@extends('layouts.app')

@section('content')

    <div class="justify-content-center">



          <form method="POST" action="{{action('HomeController@qrcode')}}" accept-charset="UTF-8">
{{ csrf_field() }}
                           <div class="tabtabtab">
  <h2 class="txt-contentsss">会計</h2>
<div class="accountimage">
    <img
    style="font-size:40px;" src="data:image/png;base64,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">
</div>

    <div class="message">
    <h3>伝票番号を入力してください</h3>
    <div class="accountnumber">
      <input name="account_number" id="account_number">
    </div>
  </div>
            <div class="justify-content-center">

                            <h4 class="inputamount">合計金額を入力してください</h4>
                            <div class="amountmoney">
                        		<input name="amount" id="amount" >
                          </div>
                        
                        </div>
                            <div class="summ"><p>円<p>
            </div>
@if(isset($data))
                        		<!-- レート -->
                        		<div class="raterate">
                              <h3></h3>
                                <input type="submit" onClick = "confirm()" value="QRコードを発行する" style="margin-left:30px; background-color:#2CBAAD; color:#FFF; border-radius:10px; border-color:#000;">


@else
                  <a href="/config/sigup"><h3 style="color:black; font-size:25px;"> 設定ページでXEMアドレスを設定してください</h3></a>
@endif
              </div>
              @csrf
            </form>
<div class="sumsum">
  <h3>支払金額</h3>
<p>5000 XEM</p>
       </div>
      <div class="main">
			<a href="/home"><input class="returnn btn btn-primary-set" type="button" value="トップページへ戻る"></a>
    </div>
  </div>
 </div>
</div>


@endsection
