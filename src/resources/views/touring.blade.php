@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/touring.css') }}">
@endsection

@section('content')

<div class="touring">
    <!-- 左 -->
    <div class="touring-left">
        <!-- 検索 -->
        <form method="get" class="search">
            @csrf
            <div class="search-nick">
                <span class="search-nick__ttl">ニックネーム</span>
                <input type="text" name="nickname" class="search-nick__name" value="{{ request('nickname') }}">
            </div>
            <div class="search-look">
                <div class="search-look__gender">
                    <span class="search-look__geander-ttl">性別</span>
                    <div class="search-look__gender-choice">
                        <label class="male"><input type="radio" name="gender" class="male" value="1" {{ request('gender') == 1 ? 'checked' : '' }}>男性</label>
                        <label class="female"><input type="radio" name="gender" class="female" value="2" {{ request('gender') == 2 ? 'checked' : '' }}>女性</label>
                        <label class="less"><input type="radio" name="gender" class="less" value="3" {{ request('gender') == 3 ? 'checked' : '' }}>その他</label>
                    </div>
                </div>
                <div class="search-look__age">
                    <span class="search-look__age-ttl">年齢</span>
                    <div class="search-look__age-choice">
                        <label class="teens"><input type="radio" name="age" class="teens" value="1" {{ request('age') == 1 ? 'checked' : '' }}>10代</label>
                        <label class="twenties"><input type="radio" name="age" class="twenties" value="2" {{ request('age') == 2 ? 'checked' : '' }}>20代</label>
                        <label class="thirties"><input type="radio" name="age" class="thirties" value="3" {{ request('age') == 3 ? 'checked' : '' }}>30代</label>
                        <label class="forties"><input type="radio" name="age" class="forties" value="4" {{ request('age') == 4 ? 'checked' : '' }}>40代</label>
                        <label class="fifties"><input type="radio" name="age" class="fifties" value="5" {{ request('age') == 5 ? 'checked' : '' }}>50代</label>
                        <label class="sixties"><input type="radio" name="age" class="sixties" value="6" {{ request('age') == 6 ? 'checked' : '' }}>60代</label>
                        <label class="seventies"><input type="radio" name="age" class="seventies" value="7" {{ request('age') == 7 ? 'checked' : '' }}>70~</label>
                    </div>
                </div>
            </div>
            <div class="search-place">
                <div class="search-place__day">
                    <span class="search-place__day-ttl">出発日</span>
                    <div class="search-place__day-choice">
                        <input type="date" name="date" class="daynow" value="{{ request('date') }}">
                    </div>
                </div>
                <div class="search-place__stay">
                    <span class="search-place__stay-ttl">日数</span>
                    <div class="search-place__stay-choice">
                        <label class="day"><input type="radio" name="day" class="day" value="1" {{ request('day') == 1 ? 'checked' : '' }}>日帰り</label>
                        <label class="per"><input type="radio" name="day" class="per" value="2" {{ request('day') == 2 ? 'checked' : '' }}>一泊</label>
                        <label class="two"><input type="radio" name="day" class="two" value="3" {{ request('day') == 3 ? 'checked' : '' }}>二泊</label>
                        <label class="over"><input type="radio" name="day" class="over" value="4" {{ request('day') == 4 ? 'checked' : '' }}>三泊～</label>
                    </div>
                </div>
                <div class="search-place__distance">
                    <span class="search-place__distance-ttl">おおよその総走行距離</span>
                    <div class="search-place__distance-choice">
                        <label class=""><input type="radio" name="distance" class="short" value="1" {{ request('distance') == 1 ? 'checked' : '' }}>～150km</label>
                        <label class=""><input type="radio" name="distance" class="shorts" value="2" {{ request('distance') == 2 ? 'checked' : '' }}>151km～</label>
                        <label class=""><input type="radio" name="distance" class="long" value="3" {{ request('distance') == 3 ? 'checked' : '' }}>250km～</label>
                        <label class=""><input type="radio" name="distance" class="longs" value="4" {{ request('distance') == 4 ? 'checked' : '' }}>350km～</label>
                        <label class=""><input type="radio" name="distance" class="longer" value="5" {{ request('distance') == 5 ? 'checked' : '' }}>500km～</label>
                    </div>
                </div>
                <div class="search-place__destination">
                    <span class="search-place__destination-ttl">目的地・方面</span>
                    <div class="search-place__destination-choice">
                        <input type="text" name="destination" class="destination" value="{{ request('destination') }}">
                    </div>
                </div>
            </div>
            <div class="button">
                <button class="button-submit" type="submit">検索する</button>
            </div>
            <div class="reset">
                <a href="{{ route('touring') }}" class="reset-link">検索結果をリセットする</a>
            </div>
        </form>
        <!-- 投稿する -->
        @if(Auth::check() && Auth::user()->profile)
        <div class="tweet" id="recruiting">
            <a href="{{ route('recruiting') }}" class="tweet-submit">マスツーリングを募集する</a>
        </div>
        @endif
    </div>

    <!-- 右 -->
    <div class="touring-right">
        @if($tourings->isEmpty())
        <div class="not">
            <p class="not-search">検索結果が見つかりません</p>
        </div>
        @else
        @foreach($tourings as $touring)
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
            <!-- 評価 -->
            <form action="{{ route('like') }}" method="post" class="card-foot">
                @csrf
                @if(Auth::check() && Auth::user()->profile)
                <input type="hidden" name="touringId" value="{{ $touring->id }}">
                <button class="good" type="submit">
                    @if ($likeExists[$touring->id])
                    <i class="fa-solid fa-thumbs-up" style="color: #0000ff;"></i>
                    @else
                    <i class="fa-solid fa-thumbs-up" style="color: #ff0000;"></i>
                    @endif
                </button>
                <span class="card-foot__good">{{ $likeCounts[$touring->id] }}</span>
                @else
                <i class="fa-solid fa-thumbs-up" style="color: #ff0000;"></i>
                <span class="card-foot__good">{{ $likeCounts[$touring->id] }}</span>
                @endif

                <a href="{{ route('comment', ['id' => $touring->id]) }}" class="card-foot__comment"><i class="fa-solid fa-message" style="color: #00ff00;"></i></a>
                <span class="card-foot__good">{{ $commentCounts[$touring->id] }}</span>
            </form>
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection