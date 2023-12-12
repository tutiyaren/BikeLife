@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

<div class="contact">
    <div class="contact-ttl">
        <h2 class="contact-ttl__top">お問い合わせ</h2>
    </div>
    <form action="{{ route('confimation') }}" method="post" class="form">
        @csrf
        <div class="name">
            <div class="name-ttl">
                <p class="name-ttl__top">お名前</p>
            </div>
            <div class="name-inner">
                @error('name')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="name" name="name" class="name-inner__input" required placeholder="フルネーム" value="{{ old('name', $inputs['name'] ?? '') }}">
            </div>
        </div>
        <div class="email">
            <div class="email-ttl">
                <p class="email-ttl__top">メールアドレス</p>
            </div>
            <div class="email-inner">
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="email" name="email" class="email-inner__input" required placeholder="sample@example.com" value="{{ old('email', $inputs['email'] ?? '') }}">
            </div>
        </div>
        <div class="content">
            <div class="content-ttl">
                <p class="content-ttl__top">お問い合わせ内容</p>
            </div>
            <div class="content-inner">
                @error('comment')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <textarea name="comment" cols="20" rows="20" placeholder="このwebアプリでは何が出来ますか？" class="content-inner__textarea" required>{{ old('comment', $inputs['comment'] ?? '') }}</textarea>
            </div>
        </div>
        <div class="button">
            <button type="submit" class="button-submit">入力内容を確認する</button>
        </div>
    </form>
</div>

@endsection