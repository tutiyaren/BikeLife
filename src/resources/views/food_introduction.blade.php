@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/food_introduction.css') }}">
@endsection

@section('content')

<div class="introduction">
    <form action="{{ route('intro') }}" method="post" class="introduction-form" enctype="multipart/form-data">
        @csrf
        <!-- タイトル -->
        <div class=" title">
            <label for="title" class="title-top">タイトル</label>
            <input id="title" type="text" name="title" class="title-input" placeholder="この投稿のタイトルを入力してください" value="{{ old('title') }}">
            @error('title')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <!-- 区分 -->
        <div class="division">
            <!-- エリア -->
            <div class="division-area">
                <select name="area" class="division-area__select">
                    <option value="" disabled {{ old('area') == '' ? 'selected' : '' }} style="display:none;">エリアを選択</option>
                    @foreach($foodAreas as $area)
                    <option value="{{ $area->area }}" {{ old('area') == $area->area ? 'selected' : '' }}>
                        {{ $area->area }}
                    </option>
                    @endforeach
                </select>
                @error('area')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <!-- ジャンル -->
            <div class="division-genre">
                <select name="genre" class="division-genre__select">
                    <option value="" disabled {{ old('genre') == '' ? 'selected' : '' }} style="display:none;">ジャンルを選択</option>
                    @foreach($foodGenres as $genre)
                    <option value="{{ $genre->genre }}" {{ old('genre') == $genre->genre ? 'selected' : '' }}>
                        {{ $genre->genre }}
                    </option>
                    @endforeach
                </select>
                @error('genre')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- テキスト -->
        <div class="content">
            <textarea name="content" cols="40" rows="5" class="content-inner" placeholder="店名や感想等あればここに記載しましょう！">{{ old('content') }}</textarea>
            @error('content')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <!-- 画像 -->
        @error('image')
        <div class="error">
            <p class="error-message">{{ $message }}</p>
        </div>
        @enderror
        @for ($i = 1; $i <= 3; $i++) @error("image{$i}") <div class="error">
            <p class="error-message">{{ $message }}</p>
</div>
@enderror
@endfor
<div class="img">
    <div class="img-image" id="image-drop-area">
        <label for="image-upload" class="image-upload-label">クリックして写真を追加</label>
        <input type="file" id="image-upload" name="image" accept="image/*" style="display:none">
        <img id="image-preview" class="image" src="" alt="写真プレビュー" style="display: none;">
    </div>

    <div class="img-image1" id="image-drop-area1">
        <label for="image-upload1" class="image-upload-label">クリックして写真を追加</label>
        <input type="file" id="image-upload1" name="image1" accept="image/*" style="display:none">
        <img id="image-preview1" class="image1" src="" alt="写真プレビュー" style="display: none;">
    </div>

    <div class="img-image2" id="image-drop-area2">
        <label for="image-upload2" class="image-upload-label">クリックして写真を追加</label>
        <input type="file" id="image-upload2" name="image2" accept="image/*" style="display:none">
        <img id="image-preview2" class="image2" src="" alt="写真プレビュー" style="display: none;">
    </div>

    <div class="img-image3" id="image-drop-area3">
        <label for="image-upload3" class="image-upload-label">クリックして写真を追加</label>
        <input type="file" id="image-upload3" name="image3" accept="image/*" style="display:none">
        <img id="image-preview3" class="image3" src="" alt="写真プレビュー" style="display: none;">
    </div>
</div>
<!-- 投稿ボタン -->
<div class="button">
    <button type="submit" class="button-submit">おすすめの飲食を投稿する</button>
</div>
</form>
</div>

<script>
    document.getElementById('image-upload').addEventListener('change', function(e) {
        var input = e.target;
        var label = input.previousElementSibling;
        var file = input.files[0];
        var imagePreview = document.getElementById('image-preview');

        if (file) {
            // 選択されたファイルが存在する場合、ファイルをプレビューに表示
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            // ファイルが選択されていない場合、プレビューを非表示にし、元のラベルを表示
            label.textContent = 'クリックして写真を追加<br>またはドロッグアンドドロップ';
            imagePreview.style.display = 'none';
        }
    });

    document.getElementById('image-upload1').addEventListener('change', function(e) {
        var input = e.target;
        var label = input.previousElementSibling;
        var file = input.files[0];
        var imagePreview = document.getElementById('image-preview1');

        if (file) {
            // 選択されたファイルが存在する場合、ファイルをプレビューに表示
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            // ファイルが選択されていない場合、プレビューを非表示にし、元のラベルを表示
            label.textContent = 'クリックして写真を追加<br>またはドロッグアンドドロップ';
            imagePreview.style.display = 'none';
        }
    });

    document.getElementById('image-upload2').addEventListener('change', function(e) {
        var input = e.target;
        var label = input.previousElementSibling;
        var file = input.files[0];
        var imagePreview = document.getElementById('image-preview2');

        if (file) {
            // 選択されたファイルが存在する場合、ファイルをプレビューに表示
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            // ファイルが選択されていない場合、プレビューを非表示にし、元のラベルを表示
            label.textContent = 'クリックして写真を追加<br>またはドロッグアンドドロップ';
            imagePreview.style.display = 'none';
        }
    });

    document.getElementById('image-upload3').addEventListener('change', function(e) {
        var input = e.target;
        var label = input.previousElementSibling;
        var file = input.files[0];
        var imagePreview = document.getElementById('image-preview3');

        if (file) {
            // 選択されたファイルが存在する場合、ファイルをプレビューに表示
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            // ファイルが選択されていない場合、プレビューを非表示にし、元のラベルを表示
            label.textContent = 'クリックして写真を追加<br>またはドロッグアンドドロップ';
            imagePreview.style.display = 'none';
        }
    });
</script>

@endsection