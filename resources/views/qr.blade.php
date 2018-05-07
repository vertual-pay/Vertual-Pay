@if(isset($qr_json))
{!!QrCode::size(300)->generate($qr_json);!!}
<img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-left:25px;">
{{$user->name}}の会計
@endif
