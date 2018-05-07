@extends('layouts.app')
@section('content')

<div>
<form enctype="multipart/form-data" action = "{{route('config.profile')}}" method="post" class="form-horizontal" style="margin-top: 50px;">
    <div class="tabtab">
　<h1>設定ページ</h1>
    <p><input type="file" name="avatar" style=" margin-right:50px;"></p>
      <p> お店の名前 : {{$user->name}}</p>
      <p> お店のメールアドレス: {{$user->email}}</p>
      <form>
        <input type ="button" value="ユーザー情報を変更する" style="font-size:15px; " onclick="user(0)">
      </form>
      <div id="user" style="visibility: hidden">
          <p><input type="text" name="name"  placeholder="ユーザー名変更"></p>
          <p><input type="text" name="email"  placeholder="メールアドレス変更"></p>
      </div>

      <script>
      function user(num)
      {
        if(num==0){document.getElementById("user").style.visibility="visible"}
      }
      </script>

    @if(isset($user))
     <p><img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-left:300px;"></p>
    @endif

      <p><input type="text" name="message"   id="message" placeholder="固定メッセージ"></p>

<p><input type="integer" name="rate_account"   id="rate_account" placeholder="rate設定">現在の変動レートは<?php echo round($rate,2)?>XEM/JPY</p>

<form>
  <input type ="button" value="アドレスを変更する" style="font-size:15px; " onclick="hyoji(0)">
</form>


  <div id="address" style="visibility: hidden">
    <p><input type="integer" name="address"  placeholder="アドレス変更"></p>
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
<div>
  @if(isset($config))
   <p>あなたのアドレスは:{{$config->address}}</p>
   <p>伝票に乗る固定メッセージ:　{{$config->message}}</p>
   <p>現在の御店のレート:　{{$config->rate_account}}XEM/JPY</p>
   @endif
 </div>
  <p><input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input style="font-size:30px; margin-left:15px;"type="submit" class="pull-right btn btn-sm btn-primary"></p>
 </form>
</div>
@endsection
