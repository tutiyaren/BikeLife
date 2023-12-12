@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')

<div class="cards">
    <div class="card know">
        <h2 class="card-home"><a href="/know" class="card-home__link">What is バイフ？</a></h2>
    </div>
    @if(Auth::check())
    <div class="card profile">
        <h2 class="card-home"><a href="/profile" class="card-home__link">{{ optional(auth()->user())->name }}<br>プロフィール</a></h2>
    </div>
    @endif
    <div class="card mypage">
        <h2 class="card-home"><a href="/" class="card-home__link">My Page</a></h2>
    </div>
    <div class="card tweet">
        <h2 class="card-mumble"><a href="/tweet" class="card-mumble__link">つぶやきの<br>バイク</a></h2>
    </div>
    <div class="card touring">
        <h2 class="card-touring"><a href="/touring" class="card-touring__link">マスツーリングへ行こう！</a></h2>
    </div>
    <div class="card">
        <div class="card-top">
            <h2 class="card-top__favorite">おすすめの</h2>
        </div>
        <div class="card-item">
            <div class="card-item__food">
                <h2 class="card-item__food-drink"><a href="/eating" class="card-item__food-drink--link">飲食</a></h2>
            </div>
            <div class="card-item__scenery">
                <h2 class="card-item__scenery-like"><a href="/scenery" class="card-item__scenery-like--link">風景</a></h2>
            </div>
        </div>
    </div>
</div>

@endsection