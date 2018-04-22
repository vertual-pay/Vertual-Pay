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
  <div class="form-group">
  <label for="address">XEMアドレス</label>
  <input type="text" id="address" name="address" class="form-control">
  </div>
  <div class="form-group">
  <label for="config_password">設定ページ用パスワード</label>
  <input type="password" id="config_password" name="config_password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">ログイン</button>
  {{ csrf_field() }}
  </form>
  </div>
  </div>
  @endsection
