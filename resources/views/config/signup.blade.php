@extends('layouts.app')

@section('content')
<div>
<form action="{{ route('config.signup') }}" method="post" class="form-horizontal" style="margin-top: 50px;">

  <label for="address">XEMアドレス</label>

  <input type="text" name="address"  id="address" placeholder="XEMアドレスを入力してください">

  <label  for="config_password">設定ページ用パスワード</label>

  <input type="password" name="config_password" id="config_password" placeholder="登録とは異なるパスワードを入力してください">

  <button type="submit">新規登録</button>
  {{ csrf_field() }}
  </form>
  </div>
@endsection
