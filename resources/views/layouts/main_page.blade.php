<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Навигаторы детства - Документы</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('css_link')
</head>
<body>
    @include('layouts.sidebar')

    <!-- Основной контент -->
    <main>
        <!-- Шапка -->
        <header>
            <div class="right">
                <div class="menu-button" id="burger">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <div class="user">
            @guest()
                <a class="user__login" href="{{ route('auth.social', 'yandex') }}">
                    Авторизация
                </a>
            @endguest
            @auth()

                    <a class="user__name">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    <a href="{{route('auth.logout')}}"><img src="{{asset('images/exit.svg')}}"  alt="выход"></a>

                </div>
            @endauth
        </header>
        <div class="main-content">
            @yield('content')
        </div>
        <footer>
            Зад
        </footer>
    </main>

    @yield('js_link')
    <script src="{{asset('js/searchTable.js')}}" type="text/javascript"></script>
</body>
</html>
