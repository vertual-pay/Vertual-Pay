<!doctype html>

@extends('layouts.app')

       @section('content')


       <div class="welcomepage">
                  <h3 class="descriptiontop">NEM/XEM（ネム/ゼム）の仮想通貨決済でオリジナル請求書が表示できる「Virtual Pay」</h3>
                  <h4 class="description26">かんたんに導入できる仮想通貨決済<br>NEM/XEMの仮想通貨決済で、<br>お店のオリジナルQRコードを表示できます。</h4>
                  <h5 class="description24">Virtual PayはかんたんにオリジナルQRコードを発行できて、<br>あんしんしてアルバイトさんにお会計を任せられる仮想通貨決済ツールです。</h5>
                  <h3 class="floatt_1">①デザインできる</h3>
                  <h3 class="floatt_2">②簡単に発行できる</h3>
                  <h3 class="floatt_3">③お会計を任せられる</h3>
                  <p class="description_1">フレームの選択・アピール写真の挿入、<br>一言コメントを添えて、オリジナル<br>QRコードを作れます。</p>
                  <p class="description_2">合計金額を入力して発行ボタンを押すだ<br>けで、かんたんにQRコードを発行でき<br>ます。</p>
                  <p class="description_3">受取アドレスの変更にパスワードを設定<br>できるので、イタズラを防止できます。</p>
                  <h4 class="description_4">誰でも簡単に仮想通貨決済を始められる<br>仮想通貨決済は、フリーで活動している方や<br>個人店にもっとも適した決済方法です。<br><br>月額会費、決済手数料はかかりません。<br>早速オリジナルQRコードを作成してみよう！</h4>
                  <h3 class="descriptionn">Virtual Payの特徴</h3>
                  <h3 class="floattt_1">レート計算機能</h3>
                  <h3 class="floattt_2">メッセージ機能</h3>
                  <h3 class="floattt_3">決済確認機能</h3>
                  <h3 class="floattt_4">完全無料</h3>

                          <img src="/ステッカー.png" style="position:absolute; width:1282px; height:400px; top:1284px; left:0px; z-index:1;">
                          <img src="/伝票.png" style="position:absolute; width:1280px; height:614px; top:182px; left:0px; z-index:1;">

                  <img class="img1" src="data:image/png;base64,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">
                  <img class="img2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAQJSURBVHhe7ZvPbht1FIW9orBlMUNFRbpg1aco9HVKQniPLiqVmXRViT8bHgTogpDyGCBhG7WrSk3nTE7Air/MOLmJGet3P+mTGh/fo86N/Ru7UmdJkiRJkiRJkiRJkiRJkiRJMhGWbX2aXl2vLw6Vp+N6fXGoPB3X64tD5em4Xl8cKk/H9friUHk6rtcXh8ql4+Kh3UjHcahcOi4e2o10HIfKpePiod1Ix3GoXDouHtqNdByHyqXj4qHdSMdxqFw6Lh7ajXQch8ql4+Kh3UjHcahcOi4e2o10HIfKpePiod1Ix3GoXDouHtqNdByHyqXj4qHdSMdxqFw6Lh7ajXQch8ql4+Kh3UjHcahcOi4e2o10HIfKpePiod1Ix3GoXDreiNMXex8um3p/2VQvO1/b7s/1/ulPDz7w00aZWo+g3UjHcahcOh7lTfvxp4um/oM6epv6RM/x0y9laj3nYEen4zhULh0Polfa4MX+56t3Tz+/47E1ptazCsz2Oo5D5dLxIMu2OqBZcnFUf+WxNabWswrNSsdxqFw6HqQ/V2GWXLT1Lx5bY2o9q9CsdByHyqXjQfqbG8yiTf2Px9aYWs8qONvpOA6VS8eD5C/gBqBy6XiQRVP9SrPk0Ft+aj2r0Kx0HIfKpeNBulfRPs2S3QU/9tgaU+tZhWal4zhULh0Poo9yG37s+33oC9DUelaB2V7HcahcOh5FX2q6V94JddjjTb9ATannHJjvdRyHyqXjjdCrSW9/nav9jbC7wXWvxJ/1Nr/KV/+p9QjajXQch8ql4+Kh3UjHcahcOi4e2o10HIfKpePiod1Ix3GoXDouHtqNdByHyqXj4qHdSMdxqFw6Lh7ajXQch8ql4+Kh3UjHcahcOi4e2o10HIfKpePiod1Ix3GoXDouHtqNdByHyqXj4qHdSMdxqFw6Lh7ajXQch8ql4+Kh3UjHcahcOi4e2o10HIfKpePiod1Ix3GoPKqrB3n35N5Hy6b+geZ3QV9GHCqP6upL+fvZJ3vd844vzu2SvpQ4VB7V1ci8qb9cNNVfNLdL+nLiUHlUV6+xbKvDRVu/pZld05cUh8qjuvpfdv28J31pcag8qqt75m19v3tsp8970pf3/0J/Mel4Nj+qHo2d92dHUnXokeQq0EJlnx1V34yd9/rl6KbclyVXh5Zqf4THLnqsj6OuSq4DLHUzuxuybsyuSa4LLnfA/khqqq89nkShJV/moq3+nH9bf+HR5CagRaNN9Vue97cALvuC3bHzfZ73twQt/Nw877cALV7meb8laPl53m+Ri8vvjp3v9L/VHSe3zcri9e85B3442RZny+/O+7Z+6IeSbdKf98/vfuYfk22T532SJEmSJEmSJEmSJMlEmM3eA+J7sor06RzsAAAAAElFTkSuQmCC">
                  <img class="img3" src="data:image/png;base64,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">
                  <img class="img4" src="data:image/png;base64,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">
                  <h5 class="floatttt_1">レートの自動計算に対応。<br>状況によってレートを<br>固定金額に切り替える<br>こともできます。</h5>
                  <h5 class="floatttt_2">店舗名を自動入力したり、<br>伝票番号を追加入力<br>できます。</h5>
                  <h5 class="floatttt_3">お会計後はしっかり決済<br>を完了できたか、履歴を<br>確認することができま<br>す。</h5>
                  <h5 class="floatttt_4">Virtual Payは全て皆様の<br>寄付にて運営されている<br>慈善サイトです。</h5>
                  <input class="registerbutton1" type="button" value="新規登録" onclick="location.href='http://127.0.0.1:8000/register'">
                  <input class="registerbutton2" type="button" value="新規登録" onclick="location.href='http://127.0.0.1:8000/register'">
                  <input class="registerbutton3" type="button" value="新規登録" onclick="location.href='http://127.0.0.1:8000/register'">
                  <input class="loginbutton" type="button" value="ログイン" onclick="location.href='http://127.0.0.1:8000/login'">

      @endsection
=======
      <title>Laravel</title>
      <img src="/ステッカー.png" style="width:1200px; height:800px;">
      <img src="/伝票.png" style="width:1200px; height:800px">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

      <!-- Styles -->
      <style>
          html, body {
              background-color: #fff;
              color: #636b6f;
              font-family: 'Raleway', sans-serif;
              font-weight: 100;
              height: 100vh;
              margin: 0;
          }

          .full-height {
              height: 100vh;
          }

          .flex-center {
              align-items: center;
              display: flex;
              justify-content: center;
          }

          .position-ref {
              position: relative;
          }

          .top-right {
              position: absolute;
              right: 10px;
              top: 18px;
          }

          .content {
              text-align: center;
          }

          .title {
              font-size: 84px;
          }

          .links > a {
              color: #636b6f;
              padding: 0 25px;
              font-size: 12px;
              font-weight: 600;
              letter-spacing: .1rem;
              text-decoration: none;
              text-transform: uppercase;
          }

          .m-b-md {
              margin-bottom: 30px;
          }
      </style>
  </head>
  
