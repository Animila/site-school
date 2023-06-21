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
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('css_link')
</head>
<body>
    <!-- Шапка -->
    <header>
        <div class="right">
            @include('layouts.sidebar')
            <a class="logo" href="{{route('index')}}">
                <img src="{{asset('images/logo.png')}}" alt="logo">
                <h1>Навигаторы детства</h1>
            </a>
        </div>
        <div class="user">
        @guest()
            <a class="user__login" href="{{ route('auth.social', 'yandex') }}">
                Авторизация
            </a>
        @endguest
        @auth()

                <div class="user__name">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <div class="user__menu">
                    <a class="user__cabinet" href="#">Кабинет</a>
                    <a class="user__exit" href="{{route('auth.logout')}}">Выйти</a>
                </div>
            </div>
        @endauth
    </header>

    <!-- Контент -->
    <main>
        @yield('content')
    </main>

    <footer>
        Зад
    </footer>

    @yield('js_link')
</body>
</html>
