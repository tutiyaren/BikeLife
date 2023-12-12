@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/eating.css') }}">
@endsection

@section('content')

<div class="eating">

    <!-- 検索 -->
    <div class="eating-top">
        <!-- エリア -->
        <form method="get" class="search area" id="searchArea">
            @csrf
            <select name="food_area" id="food_area" class="search-select">
                <option value="全てのエリア" {{ empty($request->food_area) ? 'selected' : '' }}>全てのエリア</option>
                @foreach($foodAreas as $area)
                <option value="{{ $area->area }}" {{ $request->food_area == $area->area ? 'selected' : '' }}>
                    {{ $area->area }}
                </option>
                @endforeach
            </select>
        </form>
        <!-- ジャンル -->
        <form method="get" class="search genre" id="searchGenre">
            @csrf
            <select name="food_genre" id="food_genre" class="search-select">
                <option value="全てのジャンル" {{ empty($request->food_genre) ? 'selected' : '' }}>全てのジャンル</option>
                @foreach($foodGenres as $genre)
                <option value="{{ $genre->genre }}" {{ $request->food_genre == $genre->genre ? 'selected' : '' }}>
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
    <div class="eating-cards">
        @if($eatings->isEmpty())
        <div class="not">
            <p class="not-search">検索結果が見つかりません</p>
        </div>
        @else
        @foreach($eatings as $eating)
        <a href="{{ route('detail', ['id' => $eating->id]) }}" class="eating-cards-link">
            <div class="photo">
                @if($eating->image)
                <img src="{{ asset('storage/' . $eating->image) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
                @if($eating->image1)
                <img src="{{ asset('storage/' . $eating->image1) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
                @if($eating->image2)
                <img src="{{ asset('storage/' . $eating->image2) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
                @if($eating->image3)
                <img src="{{ asset('storage/' . $eating->image3) }}" alt="投稿画像" class="photo-img slide" data-index="{{ $loop->iteration }}">
                @endif
            </div>
            <div class="ttl">
                <p class="ttl-title">{{ $eating->title }}</p>
            </div>
        </a>
        @endforeach
        @endif
    </div>

    <!-- 投稿 -->
    @if(Auth::check() && Auth::user()->profile)
    <div class="eating-foot">
        <button type="submit" class="tweet"><a href="{{ route('introduction') }}" class="tweet-link">おすすめの飲食を紹介する</a></button>
    </div>
    @endif

</div>

<script>
    // 検索・エリア
    document.addEventListener('DOMContentLoaded', function() {
        var area = document.querySelector('#searchArea');
        var select = document.querySelector('#food_area');

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
        var selectGenre = document.querySelector('#food_genre');

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