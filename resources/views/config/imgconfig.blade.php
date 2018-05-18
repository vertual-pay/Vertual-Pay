@extends('layouts.app')
@section('content')
<div style="text-align:center; line-height:1em">

<h1>請求の背景画像を変更です。以下からお選びください</h1>
<h2>現在のお客様の画像</h2>
<img src="/{{ $data->image_frame }}.png" style="width:300px; height:300px;">
<p>
<form action="{{route('config.imgconfig')}}" method="post">
<div style="border-spacing:100px;">
<label><div class="radiotype"><img src="/1.png" style="width:200px; height:150px;"><b>ステッカー１</b><input name="image" type="radio" value=1 ></div></label>
<label><div class="radiotype"><img src="/2.png" style="width:200px; height:150px;"><b>ステッカー２</b><input name="image" type="radio" value=2 ></div></label>
<label><div class="radiotype"><img src="/3.png" style="width:200px; height:150px;"><b>ステッカー３</b><input name="image" type="radio" value=3 ></div></label>
<label><div class="radiotype"><img src="/4.png" style="width:200px; height:150px;"><b>ステッカー４</b><input name="image" type="radio" value=4 ></div></label>
<label><div class="radiotype"><img src="/5.png" style="width:200px; height:150px;"><b>ステッカー５</b><input name="image" type="radio" value=5 ></div></label>
</div>


<p></p>
<p>
  <input type="submit" value="画像を変更する" class="btn-primary"style ="top:10px;">
</p>
 <a href="/home"><input class="btn-primary" style="width:500px;height:100px;margin-bottom:10px; font-size:30px;" type="button" value="トップページへ戻る"></a>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</p>

</div>
@endsection
