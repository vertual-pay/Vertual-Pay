@extends('layouts.app')

@section('content')
  <div class="justify-content-center">
<!-- その他画面-文言 -->
<div class="tabtab">
<h2 class="txt-contentsss">その他</h2>
    <div class="accountancyyy">
           		<img src="data:image/png;base64,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">
		</div>

		<!-- その他ここまで -->

		<!-- 寄付 -->
		<div class="receiveadress">
		<h3>お願い</h3>
		<p class="description">Virtual Payは皆様の寄付で運営されています。<br>
		寄付金は全てVirtual Payの運営・開発に充てられます。<br>
		Xem address(寄付専用)<br>
		NCL5ZT-RJPICJ-VZCM5U-Q7NULA-5DUFI3-TQCT5D-343N<br>
      <img src="/dominant.png" style="width:200px; height:200px; float:left;  margin-right:25px;">

		</p>
		</div>

		<!-- 寄付ここまで -->

		<!-- 決済履歴 -->
		<div class="history">
			<h3>決済履歴</h3>
			<div class="historycheck"><a href="/history"><h5>決済履歴を確認する</h5></a></div>
		</div>
		<!-- 決済履歴ここまで-->
    <!-- 戻る -->
			<p>
				<a href="/home"><input class="return btn btn-primary-set" type="button" value="トップページへ戻る" ></a>
			</p>

		<!-- ステッカー -->
		<!--<h3>ステッカー</h3>
		<div class="Sticker">
			<p class="description">Virtual Payは仮想通貨の決済インフラを拡大するために、ステッカーをご用意しています。<br>
			お店の入口、レジ前などに貼っていただけると幸いです。
    </p>
			<img src="">
			<h5>PDF</h5>
				<input type="button" value="ダウンロード" href="" class="btn btn-primary-set">
				<p>※ラミネートしてご利用ください。</p>
			<h5>Illustrator</h5>
				<input type="button" value="ダウンロード" href="" class="btn btn-primary-set">
				<p>※印刷会社へご依頼ください。</p>
		</div> -->


		<!-- ステッカーここまで -->

		<!-- オリジナル請求書 -->

		<!-- オリジナル請求書ここまで -->

		<!-- 戻る -->

	</div>
</body>
</div>
</div>
</div>
@endsection
