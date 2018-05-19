@extends('layouts.app')
@section('content')

<div>
<form enctype="multipart/form-data" action = "{{route('config.profile')}}" method="post" class="form-horizontal" style="margin-top: 50px;">
    <div class="tabtabtab" style="color:#000;">
　<h1>設定ページ</h1>
    <p>(300✖️300)  <input type="file" name="avatar" style=" margin-right:50px;" value="ユーザー画像"><p>
      <p style="margin-top:200px;"> 名前 : {{$user->name}}</p>
      <p> メールアドレス: {{$user->email}}</p>
      <form>
        <input type ="button" value="ユーザー情報を変更する" style="font-size:15px; background-color:#2CBAAD; color:#FFF; border-color:#000; margin-left:-330px;" onclick="user(0)">
      </form>
      <div id="user" style="visibility: hidden">
          <p><input type="text" name="name"  placeholder="ユーザー名変更"></p>

          <p><a href="{{ route('reset')}}" onclick="return confirm('メールアドレスを変更するためには再登
             録が必要になります。よろしいですか。（アドレスが同じであれば履歴情報などは消えておりません)')" >メールアドレス変更　※アカウント新規作成になります。(後々変更できるようにします)</a></p>
          <p><a href="{{ route('reset')}}" onclick="return confirm('パスワードを変更するためには再登
                                 録が必要になります。よろしいですか。（アドレスが同じであれば履歴情報などは消えておりません)')">
                                      パスワード変更　※アカウント新規作成になります。(後々変更できるようにします)
                                    </a></p>
      </div>

      <script type="text/javascript">
      function user(num)
      {
        if(num==0){document.getElementById("user").style.visibility="visible"}
      }
      </script>
    @if(isset($user))
     <p><img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-left:00px; margin-top:-400px;"></p>
    @endif

      <p>
        <input type="text" name="message" id="message" placeholder="固定メッセージ">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspXemメッセージに反映します。<br>店舗名などを入力すると、一つのアドレスで複数店舗を管理しやすくなります。
      </p>
      <p>
        <input type="text" name="message_foruser" id="message_foruser" placeholder="コメント">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp請求書（QRコード）に反映します。<br>お店・商品の紹介・今月のおススメなどを入力してお客様に訴求しましょう！
      </p>
      <p>
          <input type="radio" name="rate" id="rate" value="true">変動レートにする
      </p>
      <p>
      <input type="radio" name="rate" id="rate" value="false">固定レートにする
      </p>


<p><input type="integer" name="rate_account"   id="rate_account" placeholder="rate設定">
  現在の変動レートは<?php echo round($rate,2)?>XEM/JPY</p>

<form>
  <p><a href="{{route('imgconfig')}}">請求画面の背景画像を変更する</a></p>
  <input type ="button" value="XEMアドレス変更" style="font-size:15px; background-color:#2CBAAD; color:#FFF; border-color:#000; margin-left:-360px;" onclick="hyoji(0)">
</form>



  <div id="address" style="visibility: hidden">
    <p><input type="integer" name="address"  placeholder="XEMアドレス変更"></p>
</div>
<script>
function hyoji(num)
{
  if(num==0)
  {document.getElementById("address").style.visibility="visible";}
  if(num==1)
  {document.getElementById("address").style.visibility="hidden";}
}
</script>

  @if(isset($config))
   <p>あなたのアドレスは:{{$config->address}}</p>
   <p>伝票に乗るコメント:　{{$config->message}}</p>
   <p>お店用のメッセージ:  {{$config->message_foruser}}</p>
   @if($config->rate==false)
   <p>現在の御店のレート:　{{$config->rate_account}}XEM/JPY</p>
   @else
   <p>現在の御店のレート: <?php echo round($rate,2)?>XEM/JPY</p>
   @endif
   @endif

  <p><input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input style="font-size:30px; margin-left:15px; margin-bottom:-20px;"type="submit" class="btn-primary" value="変更を保存する"></p>
 </form>
 <a href="/home"><input class="btn-primary" style="margin-bottom:10px; margin-left:-100px; font-size:30px;" type="button" value="トップページへ戻る"></a>
</div>
@endsection
