@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/scenery_specifics.css') }}">
@endsection

@section('content')

<div class="specifics">
    <div class="back">
        <a href="{{ url()->previous() }}" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <!-- 画像 -->
    <div class="specifics-img">
        @if($scenery->image)
        <img src="{{ asset('storage/' . $scenery->image) }}" alt="飲食の画像" class="specifics-img__image slide" data-index="0">
        @endif
        @if($scenery->image1)
        <img src="{{ asset('storage/' . $scenery->image1) }}" alt="飲食の画像" class="specifics-img__image slide" data-index="1">
        @endif
        @if($scenery->image2)
        <img src="{{ asset('storage/' . $scenery->image2) }}" alt="飲食の画像" class="specifics-img__image slide" data-index="2">
        @endif
        @if($scenery->image3)
        <img src="{{ asset('storage/' . $scenery->image3) }}" alt="飲食の画像" class="specifics-img__image slide" data-index="3">
        @endif
    </div>

    <!-- 内容 -->
    <div class="specifics-inner">
        <!-- Sceneryの情報 -->
        <div class="scenery">
            <div class="scenery-title">
                <p class="scenery-title__ttl">{{ $scenery->title }}</p>
            </div>
            <div class="scenery-inner">
                <p class="scenery-inner__area">#{{ $scenery->scenery_area->area }}</p>
                <p class="scenery-inner__genre">#{{ $scenery->scenery_genre->genre }}</p>
            </div>
            <div class="scenery-text">
                <p class="scenery-text__content">{{ $scenery->content }}</p>
            </div>
        </div>

        <!-- ユーザー情報 -->
        <div class="card-user">
            <div class="icon">
                <i class="fa-solid fa-user" style="color: #3279ec;"></i>
            </div>
            <div class="card-user__top">
                <div class="name-time">
                    <span class="card-user__top-name">{{ $scenery->profile->nickname }}</span>
                    <span class="card-user__top-time">{{ $scenery->created_at->format('Y/m/d H:i') }}</span>
                </div>
                <div class="card-user__profile">
                    <span class="card-user__profile-age">{{ $scenery->profile->age->age }}</span>
                    <span class="card-user__profile-gender">
                        @if($scenery->profile->gender->gender === 'male')
                        男性
                        @elseif($scenery->profile->gender->gender === 'female')
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
            var slides = document.querySelectorAll('.specifics-img__image.slide');

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