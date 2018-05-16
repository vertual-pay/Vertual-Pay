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
  <h1 class ="on-flame-account">お会計</h1>
  <div class="on-flame-qr">{!!QrCode::size(350)->generate($qr_json);!!}</div>
<img src="/avatars/{{ $user->avatar }}" class="on-flame-avatar"style="width:180px; height:180px; float:left; border-radius:50%; margin-left:25px;">
<img src="/frame.png">
 <figucaption class="on-flame-text">
 <p>¥ <?php echo number_format($amount) ?></p>
 <p>NEM <?php echo round($xem_price,3)?> XEM</p>
 <p>コメント{{$data->message_foruser}}</p>
 <p>店名: {{$user->name}}</p>
</figcaption>
</figure>
<a href="/account"><input class="on-flame-return btn btn-primary-set"  type="button" value="戻る"></a>
<a href="/confirm"><input class="on-flame-ok btn btn-primary-set"  type="button" value="OK" ><a>
@endif
@endsection
