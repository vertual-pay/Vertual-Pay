@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

  <div class="card-header--">{{ __('設定ログイン') }}</div>
  @if(count($errors) >0)
  <div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
  </div>
  @endif
  @if(empty($exist))
  <a href="/config/signup"><b style="font-size:26px; color: red;">XEMアドレスが登録されておりません。設定ページでXEMアドレスを登録してください</b></a>
  @endif
  <form action="{{ route('config.signin') }}" method="post" style="margin-top: 50px;">
    {{ csrf_field() }}
  <div class="form-group row">
  <label for="config_password" class="addressxem">設定ページ用パスワード</label>
  <input type="password" id="config_password" name="config_password" class="signupaddress" style="color:#000;">

  </div>

  <button type="submit" class="btn btn-primary-set">ログイン</button>
  </form>
  @if(empty($exist))
  <a class="notyet" href="/config/signup">{{ __('※ まだ設定パスワード・XEMアドレスを登録していない方はこちら') }}</a>
  @endif

  </div>
</div>
</div>
  @endsection
