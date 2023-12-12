@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

<div class="profile">
    <!-- 成功メッセージ -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="profile-top">
        <h2 class="profile-top__ttl">プロフィール設定</h2>
        <span class="profile-top__text">アプリ内で使う情報を設定できます</span>
    </div>
    <form method="post" action="{{ route('store') }}" class="profile-inner" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="user">
            <i class="fa-solid fa-user" style="color: #3279ec; cursor: pointer;" id="uploadIcon"></i>
            <span class="user-nick">ニックネーム</span>
            @error('nickname')
            <span class="error">※{{ $message }}</span>
            @enderror
            <input type="name" name="nickname" class="user-nickname" placeholder="アプリ内での仮名を設定できます" value="{{ $profile->nickname }}">
        </div>
        <div class="gender">
            <span class="gender-ttl">性別</span>
            <div class="gender-choice">
                <label for="gender-male" class="male">
                    <input type="radio" name="gender" id="gender-male" class="gender-male" value="1" {{ $profile->gender->gender === 'male' ? 'checked' : '' }}>男性
                </label>
                <label for="gender-female" class="female">
                    <input type="radio" name="gender" id="gender-female" class="gender-female" value="2" {{ $profile->gender->gender === 'female' ? 'checked' : '' }}>女性
                </label>
                <label for="gender-other" class="less">
                    <input type="radio" name="gender" id="gender-other" class="gender-less" value="3" {{ $profile->gender->gender === 'other' ? 'checked' : '' }}>その他
                </label>
            </div>
            <div class="age">
                <span class="age-choice">年齢</span>
                <select name="age" class="age-select">
                    <option value="" disabled {{ old('age') == '' ? 'selected' : '' }} style="display:none;">年代を選択</option>
                    <option value="10代" {{ $profile->age->age === '10代' ? 'selected' : '' }}>10代</option>
                    <option value="20代" {{ $profile->age->age === '20代' ? 'selected' : '' }}>20代</option>
                    <option value="30代" {{ $profile->age->age === '30代' ? 'selected' : '' }}>30代</option>
                    <option value="40代" {{ $profile->age->age === '40代' ? 'selected' : '' }}>40代</option>
                    <option value="50代" {{ $profile->age->age === '50代' ? 'selected' : '' }}>50代</option>
                    <option value="60代" {{ $profile->age->age === '60代' ? 'selected' : '' }}>60代</option>
                    <option value="70~" {{ $profile->age->age === '70~' ? 'selected' : '' }}>70~</option>
                </select>
            </div>
            <div class="button">
                <button class="button-submit" type="submit">変更する</button>
            </div>
        </div>
    </form>
</div>

<script>

</script>

@endsection