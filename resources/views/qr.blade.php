@extends('layouts.app')
@section('content')

@if(isset($qr_json))
<?php
  if($data->rate == true){
  $xem_price = $amount * $rate;
}else{
  $xem_price = $amount / $data->rate_account;
}
?>

<figure class="flame">
<div class="on-flame-qr">{!!QrCode::size(320)->generate($qr_json);!!}</div>
<img src="/avatars/{{ $user->avatar }}" class="on-flame-avatar"style="width:250px; height:250px; float:left; border-radius:50%; margin-left:25px;">
<img src="/{{ $data->image_frame }}.png">
 <figucaption class="on-flame-text">
 <p>¥ <?php echo number_format($amount) ?></p>
 <p>NEM <?php echo round($xem_price,3)?>  XEM</p>
 <p><div class="on-flame-comment">{{$data->message_foruser}}</div></p>
 <p><div class="on-flame-shopname">店名: {{$user->name}}</div></p>
</figcaption>
</figure>
<a href="/account"><input class="on-flame-return btn btn-primary-set"  type="button" value="戻る"></a>
<a href="/confirm"><input class="on-flame-ok btn btn-primary-set"  type="button" value="OK" ><a>
@endif
@endsection
