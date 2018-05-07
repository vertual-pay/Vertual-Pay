@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    @if(isset($exist))
    <h1>設定ページでXEMアドレスを登録してください</h1>
    @endif
  <div class="card-header--">{{ __('設定ログイン') }}</div>
  @if(count($errors) >0)
  <div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
  </div>
  @endif
  <form action="{{ route('config.signin') }}" method="post" style="margin-top: 50px;">
    {{ csrf_field() }}
  <div class="form-group row">
  <label for="config_password" class="addressxem">設定ページ用パスワード</label>
  <input type="text" id="config_password" name="config_password" class="signupaddress">
  @if (isset( $_POST['config_password'])){
    if( $_POST['config_password'] == ""){
      echo 'パスワードを入力して下さい';
    }
  }
  @endif
  </div>
  <button type="submit" class="btn btn-primary-set">ログイン</button>
  </form>
  <a class="notyet" href="/config/signup">{{ __('※ まだ設定パスワード・XEMアドレスを登録していない方はこちら') }}</a>

  </div>
</div>
</div>
  @endsection
