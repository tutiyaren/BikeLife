@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confimation.css') }}">
@endsection

@section('content')

<div class="contact">
    <div class="contact-ttl">
        <h2 class="contact-ttl__top">入力内容確認</h2>
    </div>
    <form action="{{ route('thanks') }}" method="post" class="form">
        @csrf
        <div class="name">
            <div class="name-ttl">
                <p class="name-ttl__top">お名前</p>
            </div>
            <div class="name-inner">
                <input class="name-inner__confimation" name="name" value="{{ $inputs['name'] }}" type="text" readonly>
            </div>
        </div>
        <div class="email">
            <div class="email-ttl">
                <p class="email-ttl__top">メールアドレス</p>
            </div>
            <div class="email-inner">
                <input class="email-inner__confimation" name="email" value="{{ $inputs['email'] }}" type="text" readonly>
            </div>
        </div>
        <div class="content">
            <div class="content-ttl">
                <p class="content-ttl__top">お問い合わせ内容</p>
            </div>
            <div class="content-inner">
                <textarea class="content-inner__confimation" name="comment" type="text" readonly id="" cols="20" rows="20">{{ $inputs['comment'] }}</textarea>
            </div>
        </div>
        <div class="correction">
            <button class="correction-submit" type="submit" name="action" value="back">入力内容を修正する</button>
        </div>
        <div class="button">
            <button class="button-submit" type="submit" name="action" value="submit">送信する</button>
        </div>
    </form>
</div>

@endsection