@extends('layout.template')
@section('title', 'Login')

@section('content')
<form method="POST" action="/user/login">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <!--<div>
        <input type="checkbox" name="remember"> Remember Me
    </div>-->

    <div>
        <button type="submit">Login</button> {{$error}}
    </div>
</form>
@endsection