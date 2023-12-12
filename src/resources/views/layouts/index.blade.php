<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeLife</title>
    <link rel="shortcut icon" href="{{ asset('motorbike.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @yield('css')
    <link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

    <header class="header">
        <div class="header-inner">
            <div class="header-inner__left">
                <h1 class="header-inner__left-ttl"><a href="/" class="header-inner__left-link">バイフ</a><i class="fa-solid fa-motorcycle fa-shake" style="color: rgb(213, 7, 7);"></i></h1>
            </div>
            <div class="header-inner__right">
                @if(Auth::check())
                <form method="post" action="/logout" class="logout">
                    @csrf
                    <button class="header-inner__right-auth logout-button">ログアウト</button>
                </form>
                @else
                <a href="login" class="header-inner__right-auth">ログイン</a>
                @endif
            </div>
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="footer-inner">
            @if(Auth::check())
            <div class="footer-inner__left">
                <p class="footer-inner__left-contact"><a href="/contact" class="footer-inner__left-link">お問い合わせ</a></p>
            </div>
            @endif
            <div class="footer-inner__right">
                <small class="footer-inner__right-copyright">&copy; 2023 Ren Tsuchiya</small>
            </div>
        </div>
    </footer>

</body>

</html>