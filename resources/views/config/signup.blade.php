@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-header--">{{ __('XEMアドレス・設定パスワード登録') }}</div>
<form action="{{ route('config.signup') }}" method="post" class="form-horizontal" style="margin-top: 50px;" >

      @csrf
  <div class="form-group row">

  <label for="address" class="addressxem">XEMアドレス</label>

  <input type="text" name="address"  id="address" placeholder="XEMアドレスを入力してください" class="signupaddress">
</div>

<div class="form-group row">
  <label  for="config_password" class="addressxem">設定ページ用パスワード</label>

  <input type="password" name="config_password" id="config_password" placeholder="登録とは異なるパスワードを入力してください" class="signupaddress">

</div>
  <button type="submit" class="btn btn-primary-set">設定ページ登録</button>
  {{ csrf_field() }}
  </form>
  </div>
  <a class="alreadydone" href="/signin">{{ __('※ すでに登録している方はこちら') }}</a>
</div>
</div>
@endsection
