@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="register">
    <div class="register-top">
        <h2 class="register-top__ttl">会員登録</h2>
    </div>
    <form class="register-inner" method="post" action="/register">
        @csrf
        <div class="name">
            <div class="name-ttl">
                <p class="name-ttl__full">名前</p>
            </div>
            <div class="name-text">
                @error('name')
                <p class="error">※{{ $message }}</p>
                @enderror
                <input type="name" class="name-text__input" placeholder="フルネーム" required name="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="email">
            <div class="email-ttl">
                <p class="email-ttl__full">メールアドレス</p>
            </div>
            <div class="email-text">
                @error('email')
                <p class="error">※{{ $message }}</p>
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
                <p class="error">※{{ $message }}</p>
                @enderror
                <input type="password" class="password-text__input" placeholder="パスワード" required name="password">
            </div>
        </div>
        <div class="password">
            <div class="password-ttl">
                <p class="password-ttl__full">確認パスワード</p>
            </div>
            <div class="password-text">
                <input type="password" class="password-text__input" placeholder="確認パスワード" name="password_confirmation" required>
            </div>
        </div>
        <div class="button">
            <button class="button-submit" type="submit">会員登録</button>
        </div>
    </form>
    <div class="register-foot">
        <a href="/login" class="register-foot__login">アカウントをお持ちの方はこちら</a>
    </div>
</div>

@endsection