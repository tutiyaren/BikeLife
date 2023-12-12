@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/recruiting.css') }}">
@endsection

@section('content')

<div class="recruiting">
    <form action="{{ route('add') }}" method="post" class="recruiting-form">
        @csrf
        <button class="recruiting-form__post">
            <span class="recruiting-form__post-ttl">募集する</span><i class="fa-solid fa-circle-right" style="color: #b21ac7;"></i>
        </button>
        <div class="recruiting-place">
            <div class="recruiting-place__day">
                <span class="recruiting-place__day-ttl">出発日</span>
                <div class="recruiting-place__day-choice">
                    <input type="date" name="date" class="daynow" value="{{ \Carbon\Carbon::now()->toDateString() }}" max="{{ \Carbon\Carbon::now()->addMonths(3)->toDateString() }}" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                </div>
            </div>
            <div class="recruiting-place__stay">
                <span class="recruiting-place__stay-ttl">日数</span>
                <div class="recruiting-place__stay-choice">
                    <label class="day"><input type="radio" name="day" class="day" value="1" {{ old('day') == 1 ? 'checked' : '' }}>日帰り</label>
                    <label class="per"><input type="radio" name="day" class="per" value="2" {{ old('day') == 2 ? 'checked' : '' }}>一泊</label>
                    <label class="two"><input type="radio" name="day" class="two" value="3" {{ old('day') == 3 ? 'checked' : '' }}>二泊</label>
                    <label class="over"><input type="radio" name="day" class="over" value="4" {{ old('day') == 4 ? 'checked' : '' }}>三泊～</label>
                </div>
                @error('day')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="recruiting-place__distance">
                <span class="recruiting-place__distance-ttl">おおよその総走行距離</span>
                <div class="recruiting-place__distance-choice">
                    <label class="short"><input type="radio" name="distance" class="short" value="1" {{ old('distance') == 1 ? 'checked' : '' }}>～150km</label>
                    <label class="shorts"><input type="radio" name="distance" class="shorts" value="2" {{ old('distance') == 2 ? 'checked' : '' }}>151km～</label>
                    <label class="long"><input type="radio" name="distance" class="long" value="3" {{ old('distance') == 3 ? 'checked' : '' }}>250km～</label>
                    <label class="longs"><input type="radio" name="distance" class="longs" value="4" {{ old('distance') == 4 ? 'checked' : '' }}>350km～</label>
                    <label class="longer"><input type="radio" name="distance" class="loger" value="5" {{ old('distance') == 5 ? 'checked' : '' }}>500km～</label>
                </div>
                @error('distance')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="recruiting-place__destination">
                <span class="recruiting-place__destination-ttl">目的地・方面</span>
                <div class="recruiting-place__destination-choice">
                    <input type="text" name="destination" class="destination" required value="{{ old('destination') }}">
                </div>
                @error('destination')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="recruiting-form__inner">
            @error('content')
            <span class="error-message">{{ $message }}</span>
            @enderror
            <textarea name="content" cols="29" rows="9" class="recruiting-form__inner-tweet" placeholder="待ち合わせ時間・場所等、伝えたいことを書きましょう！" required>{{ old('content') }}</textarea>
        </div>
    </form>
</div>

@endsection