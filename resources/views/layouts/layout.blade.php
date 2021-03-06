<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CDRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- 各ページごとにtitleタグをいれるために＠yieldで空けておく-->
        <title>@yield('title')</title>

        <!-- Scripts -->
        <!-- Lalavel標準で用意されているJavascriptを読み込む -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css? family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Styles -->
        <!-- Laravel標準で用意されているCSSを読み込む -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- layout.cssを読み込む -->
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="header-container">
                <div class="header-left">
                    <div class="make-a-pin">
                        <a>
                        <i class="fas fa-map-pin"></i>
                        </a>
                    </div>
                </div>
                <div class="header-logo">
                    <h1>Photo Map</h1>
                </div>

                @if (Route::has('login'))
                <div class="header-right">
                    @auth
                        <a href="{{ url('/mypage') }}">
                            <button type="button" class="mypage-btn">My Page</button>
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <button type="button" class="login-btn">Login</button>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                <button type="button" class="register-btn">Register</button>
                            </a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
        </header>
        {{-- コンテンツを入れる --}}
        @yield('content')
        <footer>
        <div class="footer-container">

        </div>
        </footer>
    </body>
</html>