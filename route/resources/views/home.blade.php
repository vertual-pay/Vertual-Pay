@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
 <h1 >こちらへ<h1>
   <a href="/main/balance">会計</a>
   <a href="/main/config">設定</a>
   <a href="/main/other">その他</a>
   <a href="/main/history">決済履歴</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
