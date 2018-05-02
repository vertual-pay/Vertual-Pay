@extends('layouts.app')

@section('content')
<h1>決済履歴</h1>
@for ($i = 0; $i < 10; $i++)
    <b>XEM料金</b><p>{{$result["data"][$i]["transaction"]["amount"]}}</p>
    <b>決済時間</b><p>{{$result["data"][$i]["transaction"]["timeStamp"]}}</p>
    <b>送金した公開鍵</b><p>{{$result["data"][$i]["transaction"]["signer"]}}</p>
@endfor


@endsection
