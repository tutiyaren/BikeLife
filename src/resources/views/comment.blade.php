@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('content')

<div class="comment">
    <!-- 左 -->
    <div class="comment-left">
        <div class="card">
            <!-- user情報 -->
            <div class="card-user">
                <div class="icon">
                    <i class="fa-solid fa-user" style="color: #3279ec;"></i>
                </div>
                <div class="card-user__top">
                    <div class="name-time">
                        <span class="card-user__top-name">{{ $touring->profile->nickname }}</span>
                        <span class="card-user__top-time">{{ $touring->created_at->format('Y/m/d H:i') }}</span>
                    </div>
                    <div class="card-user__profile">
                        <span class="card-user__profile-age">{{ $touring->profile->age->age }}</span>
                        <span class="card-user__profile-gender">
                            @if($touring->profile->gender->gender === 'male')
                            男性
                            @elseif($touring->profile->gender->gender === 'female')
                            女性
                            @else
                            その他
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="touring-place">
                <div class="touring-place__day">
                    <span class="touring-place__day-ttl">出発日：</span>
                    <div class="touring-place__day-choice">
                        <span class="daier">{{ $touring->date }}</span>
                    </div>
                </div>
                <div class="touring-place__stay">
                    <span class="touring-place__stay-ttl">日数：</span>
                    <div class="touring-place__stay-choice">
                        <span class="stay">{{ $touring->day->day }}</span>
                    </div>
                </div>
                <div class="touring-place__distance">
                    <span class="touring-place__distance-ttl">おおよその総走行距離：</span>
                    <div class="touring-place__distance-choice">
                        <span class="load">{{ $touring->distance->distance }}</span>
                    </div>
                </div>
                <div class="touring-place__destination">
                    <span class="touring-place__destination-ttl">目的地・方面：</span>
                    <div class="touring-place__destination-choice">
                        <span class="destination-input">{{ $touring->destination }}</span>
                    </div>
                </div>
            </div>
            <!-- テキスト -->
            <div class="card-text">
                <p class="card-text__content">{{ $touring->content }}</p>
            </div>
        </div>
    </div>

    <!-- 右 -->
    <div class="comment-right">
        @if($comments->isEmpty())
        <div class="not">
            <p class="not-search">コメントはまだありません。</p>
        </div>
        @if(Auth::check() && Auth::user()->profile)
        <div class="text-button text" id="commentButton">
            <button class="text-button__submit" type="button" onclick="toggleComments()">コメントする</button>
        </div>
        @endif
        <form action="{{ route('transmission') }}" method="post" class="text" style="display: none;" id="commentForm">
            @csrf
            <input type="hidden" name="touring_id" value="{{ $touring->id }}">
            <textarea class="text-textarea" name="content" cols="37" rows="8" placeholder="質問や、参加の意思などがあれば投稿者に伝えましょう！" 　required>{{ old('content') }}</textarea>
            <div class="text-button">
                <button class="text-button__submit" type="submit">コメントを送信する</button>
            </div>
        </form>
        @error('content')
        <div class="error">
            <p class="error-message">{{ $message}}</p>
        </div>
        @enderror
        @else
        @if(Auth::check() && Auth::user()->profile)
        <div class="text-button text" id="commentButton">
            <button class="text-button__submit" type="button" onclick="toggleComments()">コメントする</button>
        </div>
        @endif
        <form action="{{ route('transmission') }}" method="post" class="text" style="display: none;" id="commentForm">
            @csrf
            <input type="hidden" name="touring_id" value="{{ $touring->id }}">
            <textarea class="text-textarea" name="content" cols="37" rows="8" placeholder="質問や、参加の意思などがあれば投稿者に伝えましょう！" 　required>{{ old('content') }}</textarea>
            <div class="text-button">
                <button class="text-button__submit" type="submit">コメントを送信する</button>
            </div>
        </form>
        @error('content')
        <div class="error">
            <p class="error-message">{{ $message}}</p>
        </div>
        @enderror
        @foreach($comments as $comment)
        <div class="card touring-comment__content">
            <!-- user情報 -->
            <div class="card-user">
                <div class="icon">
                    <i class="fa-solid fa-user many" style="color: #3279ec;"></i>
                </div>
                <div class="card-user__top">
                    <div class="name-time">
                        <span class="card-user__top-name">{{ $comment->profile->nickname }}</span>
                        <span class="card-user__top-time">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                    </div>
                    <div class="card-user__profile">
                        <span class="card-user__profile-age">{{ $comment->profile->age->age }}</span>
                        <span class="card-user__profile-gender">
                            @if($comment->profile->gender->gender === 'male')
                            男性
                            @elseif($comment->profile->gender->gender === 'female')
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
                <p class="card-text__content">{{ $comment->content }}</p>
            </div>
            <div class="card-foot">
                <!-- リプライ表示アイコン -->
                <i id="replie" class="fa-solid fa-message replie-icon" style="color: #00ff00;"></i>
            </div>
            <!-- リプライの表示エリア -->
            <div class="replie-area" style="display: none;">
                @if($comment->replies->isEmpty())
                <div class="no">
                    <p class="no-search">リプライはまだありません。</p>
                </div>
                @if(Auth::check() && Auth::user()->profile)
                <div class="text-button text" id="replieButton_{{ $comment->id }}">
                    <button class="text-button__submit" type="button" onclick="toggleRepliesForm({{ $comment->id }})">リプライする</button>
                </div>
                @endif
                <form action="{{ route('replie') }}" method="post" class="text" style="display: none;" id="replieForm_{{ $comment->id }}">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <textarea name="content" cols="37" rows="8" class="text-textarea replie-textarea" placeholder="リプライを送ろう！" required></textarea>
                    @error('content')
                    <div class="error">
                        <p class="error-message">{{ $message}}</p>
                    </div>
                    @enderror
                    <div class="text-button">
                        <button class="text-button__submit" type="submit">リプライを送信する</button>
                    </div>
                </form>
                @else
                @foreach($comment->replies as $reply)
                <div class="card touring-replie__content">
                    <!-- user情報 -->
                    <div class="card-user">
                        <div class="icon">
                            <i class="fa-solid fa-user many replieIcon" style="color: #3279ec;"></i>
                        </div>
                        <div class="card-user__top">
                            <div class="name-time">
                                <span class="card-user__top-name">{{ $reply->profile->nickname }}</span>
                                <span class="card-user__top-time">{{ $reply->created_at->format('Y/m/d H:i') }}</span>
                            </div>
                            <div class="card-user__profile">
                                <span class="card-user__profile-age">{{ $reply->profile->age->age }}</span>
                                <span class="card-user__profile-gender">
                                    @if($reply->profile->gender->gender === 'male')
                                    男性
                                    @elseif($reply->profile->gender->gender === 'female')
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
                        <p class="card-text__content">{{ $reply->content }}</p>
                    </div>
                </div>
                @endforeach
                @if(Auth::check() && Auth::user()->profile)
                <div class="text-button text" id="replieButton_{{ $comment->id }}">
                    <button class="text-button__submit" type="button" onclick="toggleRepliesForm({{ $comment->id }})">リプライする</button>
                </div>
                @endif
                <form action="{{ route('replie') }}" method="post" class="text" style="display: none;" id="replieForm_{{ $comment->id }}">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <textarea name="content" cols="37" rows="8" class="text-textarea replie-textarea" placeholder="リプライを送ろう！" required></textarea>
                    @error('content')
                    <div class="error">
                        <p class="error-message">{{ $message}}</p>
                    </div>
                    @enderror
                    <div class="text-button">
                        <button class="text-button__submit" type="submit">リプライを送信する</button>
                    </div>
                </form>
                @endif

            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".replie-icon").click(function() {
            // Toggle the visibility of the nearest .replie-area
            $(this).closest(".card").find(".replie-area").toggle();
        });

        $(".send").click(function() {
            // Toggle the visibility of the nearest .replie-area
            $(this).find(".sent");
        });
    });

    function toggleComments() {
        // 送信フォームと送るボタンの表示状態を切り替える
        document.getElementById('commentForm').style.display = 'block';
        document.getElementById('commentButton').style.display = 'none';
    }

    function toggleRepliesForm(commentId) {
        // 送信フォームと送るボタンの表示状態を切り替える
        document.getElementById('replieForm_' + commentId).style.display = 'block';
        document.getElementById('replieButton_' + commentId).style.display = 'none';
    }
</script>

@endsection