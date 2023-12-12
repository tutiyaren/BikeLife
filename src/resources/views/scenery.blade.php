@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/scenery.css') }}">
@endsection

@section('content')

<div class="scenery">

    <!-- 検索 -->
    <div class="scenery-top">
        <!-- エリア -->
        <form method="get" class="search area" id="searchArea">
            @csrf
            <select name="scenery_area" id="scenery_area" class="search-select">
                <option value="全てのエリア" {{ empty($request->scenery_area) ? 'selected' : '' }}>全てのエリア</option>
                @foreach($sceneryAreas as $area)
                <option value="{{ $area->area }}" {{ $request->scenery_area == $area->area ? 'selected' : '' }}>
                    {{ $area->area }}
                </option>
                @endforeach
            </select>
        </form>
        <!-- ジャンル -->
        <form method="get" class="search genre" id="searchGenre">
            @csrf
            <select name="scenery_genre" id="scenery_genre" class="search-select">
                <option value="全てのジャンル" {{ empty($request->scenery_genre) ? 'selected' : '' }}>全てのジャンル</option>
                @foreach($sceneryGenres as $genre)
                <option value="{{ $genre->genre }}" {{ $request->scenery_genre == $genre->genre ? 'selected' : '' }}>
                    {{ $genre->genre }}
                </option>
                @endforeach
            </select>
        </form>
        <!-- タイトル -->
        <form method="get" class="search title">
            @csrf
            <label for="title">
                <i class="fa-solid fa-magnifying-glass"></i>
            </label>
            <input type="text" id="title" name="title" placeholder="タイトルで検索" class="search-input" value="{{ request('title') }}">

        </form>
    </div>

    <!-- 一覧 -->
    <div class="scenery-cards">
        @if($sceneries->isEmpty())
        <div class="not">
            <p class="not-search">検索結果が見つかりません</p>
        </div>
        @else
        @foreach($sceneries as $scenery)
        <a href="{{ route('specifics', ['id' => $scenery->id]) }}" class="scenery-cards-link">
            <div class="photo">
                @if($scenery->image)
                <img src="{{ asset('storage/' . $scenery->image) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
                @if($scenery->image1)
                <img src="{{ asset('storage/' . $scenery->image1) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
                @if($scenery->image2)
                <img src="{{ asset('storage/' . $scenery->image2) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
                @if($scenery->image3)
                <img src="{{ asset('storage/' . $scenery->image3) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
            </div>
            <div class="ttl">
                <p class="ttl-title">{{ $scenery->title }}</p>
            </div>
        </a>
        @endforeach
        @endif
    </div>

    <!-- 投稿 -->
    @if(Auth::check() && Auth::user()->profile)
    <div class="scenery-foot">
        <button type="submit" class="tweet"><a href="{{ route('referral') }}" class="tweet-link">おすすめの飲食を紹介する</a></button>
    </div>
    @endif

</div>

<script>
    // 検索・エリア
    document.addEventListener('DOMContentLoaded', function() {
        var area = document.querySelector('#searchArea');
        var select = document.querySelector('#scenery_area');

        // フォームがサブミットされたときに選択した値を保存
        area.addEventListener('submit', function(event) {
            localStorage.setItem('selectedArea', select.value);
        });

        // ページが読み込まれたときに保存された値を選択
        var selectedArea = localStorage.getItem('selectedArea');
        if (selectedArea) {
            select.value = selectedArea;
        }

        // キーダウンイベントでエンターキーを監視
        area.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                area.submit();
            }
        });
    });
    // 検索・ジャンル
    document.addEventListener('DOMContentLoaded', function() {
        var formGenre = document.querySelector('#searchGenre');
        var selectGenre = document.querySelector('#scenery_genre');

        // フォームがサブミットされたときに選択した値を保存
        formGenre.addEventListener('submit', function(event) {
            localStorage.setItem('selectedGenre', selectGenre.value);
        });

        // ページが読み込まれたときに保存された値を選択
        var selectedGenre = localStorage.getItem('selectedGenre');
        if (selectedGenre) {
            selectGenre.value = selectedGenre;
        }

        // キーダウンイベントでエンターキーを監視
        formGenre.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                formGenre.submit();
            }
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.photo-img.slide').forEach(function(img) {
            var slideIndex = 0;

            function showSlides() {
                var slides = document.querySelectorAll('.photo-img.slide[data-index="' + img.getAttribute('data-index') + '"]');

                // すべてのスライドを非表示にする
                slides.forEach(function(slide) {
                    slide.style.display = "none";
                });

                // 次のスライドを表示
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1;
                }

                slides[slideIndex - 1].style.display = "block";

                setTimeout(showSlides, 2000);
            }

            showSlides();
        });
    });
</script>

@endsection