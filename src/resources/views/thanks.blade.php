@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks">
    <p class="thanks-ttl">お問い合わせが送信されました。</p>
    <div class="thanks-back">
        <a href="{{ route('top') }}" class="thanks-back__link">ホームに戻る</a>
    </div>
</div>

@endsection