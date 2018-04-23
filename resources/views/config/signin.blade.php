@extends('layouts.app')

@section('content')
  <div class="row">
  <div class="col-md-4 col-md-offset-4">
  <h1>Sign In</h1>
  @if(count($errors) >0)
  <div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
  </div>
  @endif
  <form action="{{ route('config.signin') }}" method="post">
    {{ csrf_field() }}
  <div class="form-group">
  <label for="config_password">設定ページ用パスワード</label>
  <input type="text" id="config_password" name="config_password" class="form-control">
  @if (isset( $_POST['config_password'])){
    if( $_POST['config_password'] == ""){
      echo 'パスワードを入力して下さい';
    }
  }
  @endif
  </div>
  <button type="submit" class="btn btn-primary">ログイン</button>
  </form>
  </div>
  </div>
  @endsection
