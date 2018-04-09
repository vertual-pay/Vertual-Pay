@extends('layouts.app')
@section('content')
@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

<div class=”container”>
<div class=”row”>
<div class=”col-md-8 col-md-offset-2">
<div class=”panel panel-default”>
<div class=”panel-heading”>Registration</div>
<div class=”panel-body”>
You have successfully registered. An email is sent to you for verification.
</div>
</div>
</div>
</div>
</div>
@endsection

@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent


@component('mail::button', ['url' => route('verifyemail',['email_token' => '$email_token'])])
    Verify
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
