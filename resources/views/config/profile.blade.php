@extends('layouts.app')
@section('content')
<div>
<form action = "{{route('config.profile')}}" method="put" class="form-horizontal" style="margin-top: 50px;">

    <input type="text" name="message"  id="message" placeholder="固定メッセージ">
    <input type="text" name="message"  id="boolean" placeholder="reta設定">
    <input type="checkbox" name="message"  id="integer" placeholder="レート">
    {{ csrf_token() }}
    <button type="submit">変更</button>
</form>
</div>
@endsection