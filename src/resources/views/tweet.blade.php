@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/tweet.css') }}">
@endsection

@section('content')

<div class="tweet">
    <form method="get" class="tweet-search">
        @csrf
        <!-- キーワード検索 -->
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" name="keyword" placeholder="投稿を検索" class="tweet-search__inner" value="{{ request('keyword') }}">
    </form>

    <!-- つぶやき -->
    <div class="tweet-cards">
        @foreach($tweets as $tweet)
        <div class="card">
            <!-- user情報 -->
            <div class="card-user">
                <div class="icon">
                    <i class="fa-solid fa-user" style="color: #3279ec;"></i>
                </div>
                <div class="card-user__top">
                    <div class="name-time">
                        <span class="card-user__top-name">{{ $tweet->profile->nickname }}</span>
                        <span class="card-user__top-time">{{ $tweet->created_at->format('Y/m/d H:i') }}</span>
                    </div>
                    <div class="card-user__profile">
                        <span class="card-user__profile-age">{{ $tweet->profile->age->age }}</span>
                        <span class="card-user__profile-gender">
                            @if($tweet->profile->gender->gender === 'male')
                            男性
                            @elseif($tweet->profile->gender->gender === 'female')
                            女性
                            @else
                            その他
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <!-- テキスト -->
            <div class="card-text">
                <p class="card-text__content">{{ $tweet->tweet }}</p>
            </div>
            <!-- 評価 -->
            @if(Auth::check() && Auth::user()->profile)
            <form action="{{ route('favorite') }}" method="post" class="card-foot">
                @csrf
                <input type="hidden" name="tweetId" value="{{ $tweet->id }}">
                <button class="good" type="submit">
                    @if ($favoriteExists[$tweet->id])
                    <i class="fa-solid fa-thumbs-up" style="color: #0000ff;"></i>
                    @else
                    <i class="fa-solid fa-thumbs-up" style="color: #ff0000;"></i>
                    @endif
                </button>
                <span class="card-foot__good">{{ $tweet->favorite_count }}</span>
            </form>
            @else
            <div class="card-foot">
                <i class="fa-solid fa-thumbs-up" style="color: #ff0000;"></i>
                <span class="card-foot__good">{{ $tweet->favorite_count }}</span>
            </div>
            @endif
        </div>
        @endforeach
    </div>

    <!-- 投稿する -->
    @if(Auth::check() && Auth::user()->profile)
    <div class="post">
        <a href="{{ route('write') }}" class="tweet-post">
            <p class="tweet-post__tttl">投稿する</p>
            <i class="fa-solid fa-pen"></i>
        </a>
    </div>
    @endif
</div>

@endsection