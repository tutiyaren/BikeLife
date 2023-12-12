@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="login">
    <div class="login-top">
        <h2 class="login-top__ttl">ログイン</h2>
    </div>
    <form class="login-inner" method="post" action="/login">
        @csrf
        <div class="email">
            <div class="email-ttl">
                <p class="email-ttl__full">メールアドレス</p>
            </div>
            <div class="email-text">
                @error('email')
                <p class="error">※{{$errors->first('email')}}</p>
                @enderror
                <input type="email" class="email-text__input" placeholder="メールアドレス" required name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="password">
            <div class="password-ttl">
                <p class="password-ttl__full">パスワード</p>
            </div>
            <div class="password-text">
                @error('password')
                <p class="error">※{{$errors->first('password')}}</p>
                @enderror
                <input type="password" class="password-text__input" placeholder="パスワード" required name="password">
            </div>
        </div>
        <div class="button">
            <button class="button-submit" type="submit">ログイン</button>
        </div>
    </form>
    <div class="login-foot">
        <a href="/register" class="login-foot__register">アカウントをお持ちでない方はこちら</a>
    </div>
</div>

@endsection