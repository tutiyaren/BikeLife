@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/food_detail.css') }}">
@endsection

@section('content')

<div class="detail">
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <!-- 画像 -->
    <div class="detail-img">
        @if($eating->image)
        <img src="{{ asset('storage/' . $eating->image) }}" alt="飲食の画像" class="detail-img__image slide" data-index="0">
        @endif
        @if($eating->image1)
        <img src="{{ asset('storage/' . $eating->image1) }}" alt="飲食の画像" class="detail-img__image slide" data-index="1">
        @endif
        @if($eating->image2)
        <img src="{{ asset('storage/' . $eating->image2) }}" alt="飲食の画像" class="detail-img__image slide" data-index="2">
        @endif
        @if($eating->image3)
        <img src="{{ asset('storage/' . $eating->image3) }}" alt="飲食の画像" class="detail-img__image slide" data-index="3">
        @endif
    </div>

    <!-- 内容 -->
    <div class="detail-inner">
        <!-- Foodの情報 -->
        <div class="food">
            <div class="food-title">
                <p class="food-title__ttl">{{ $eating->title }}</p>
            </div>
            <div class="food-inner">
                <p class="food-inner__area">#{{ $eating->food_area->area }}</p>
                <p class="food-inner__genre">#{{ $eating->food_genre->genre }}</p>
            </div>
            <div class="food-text">
                <p class="food-text__content">{{ $eating->content }}</p>
            </div>
        </div>

        <!-- ユーザー情報 -->
        <div class="card-user">
            <div class="icon">
                <i class="fa-solid fa-user" style="color: #3279ec;"></i>
            </div>
            <div class="card-user__top">
                <div class="name-time">
                    <span class="card-user__top-name">{{ $eating->profile->nickname }}</span>
                    <span class="card-user__top-time">{{ $eating->created_at->format('Y/m/d H:i') }}</span>
                </div>
                <div class="card-user__profile">
                    <span class="card-user__profile-age">{{ $eating->profile->age->age }}</span>
                    <span class="card-user__profile-gender">
                        @if($eating->profile->gender->gender === 'male')
                        男性
                        @elseif($eating->profile->gender->gender === 'female')
                        女性
                        @else
                        その他
                        @endif
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var slideIndex = 0;

        function showSlides() {
            var slides = document.querySelectorAll('.detail-img__image.slide');

            // すべてのスライドを非表示にする
            slides.forEach(function(slide) {
                slide.style.display = "none";
            });

            // 次のスライドを表示
            slideIndex++;
            if (slideIndex > slides.length - 1) {
                slideIndex = 0;
            }

            slides[slideIndex].style.display = "block";

            // 4秒ごとにスライドを切り替える
            setTimeout(showSlides, 4000);
        }

        // 初回のスライド表示
        showSlides();
    });
</script>

@endsection