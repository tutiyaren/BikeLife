@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/write.css') }}">
@endsection

@section('content')

<div class="write">
    <form action="{{ route('post') }}" method="post" class="write-form">
        @csrf
        <button class="write-form__post">
            <span class="write-form__post-ttl">つぶやく</span><i class="fa-solid fa-circle-right" style="color: #b21ac7;"></i>
        </button>
        <div class="write-form__inner">
            <textarea name="tweet" cols="29" rows="9" class="write-form__inner-tweet" placeholder="バイクに関するつぶやきをしましょう！" required></textarea>
        </div>
    </form>
</div>

@endsection