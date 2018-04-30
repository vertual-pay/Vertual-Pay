@extends('layouts.app')
@section('content')

<div>
<form enctype="multipart/form-data" action = "{{route('config.profile')}}" method="post" class="form-horizontal" style="margin-top: 50px;">

    <input type="file" name="avatar" style="float: margin-right:50px;">
    <input type="text" name="message"  id="message" placeholder="固定メッセージ">
    <input type="text" name="message"  id="boolean" placeholder="reta設定">
    <input type="checkbox" name="integer"  id="integer" placeholder="レート">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <input type="submit" class="pull-right btn btn-sm btn-primary">

</form>
</div>
<div>
  @if(isset($config))
   {{$config->address}}
   {{$config->message}}
   @endif
 </div>
 @if(isset($user))
  <img src="/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
 @endif
@endsection
