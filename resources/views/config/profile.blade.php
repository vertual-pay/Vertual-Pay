@extends('layouts.app')
@section('content')

<div>
<form enctype="multipart/form-data" action = "{{route('config.profile')}}" method="post" class="form-horizontal" style="margin-top: 50px;">

    <p><input type="file" name="avatar" style="float: margin-right:50px;"></p>
    <p><input type="text" name="message"   id="message" placeholder="固定メッセージ"></p>
    <p><input type="integer" name="rate_account"   id="rate_account" placeholder="rate設定"></p>
    <input type="checkbox" name="integer"  id="integer">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <p><input type="submit" class="pull-right btn btn-sm btn-primary"></p>

</form>
</div>
<div>
  @if(isset($config))
   <p>{{$config->message}}</p>
   <p>{{$config->rate_account}}</p>
   @endif
 </div>
 @if(isset($user))
  <img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
 @endif
@endsection
