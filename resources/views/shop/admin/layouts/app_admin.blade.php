<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400;300" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin-menu.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a class="icon-menu">
                    Админ меню
                </a>
                <a href="{{ url('/home') }}">Главная</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
            @endif
        </div>
        <div class="menu">
            <!-- Иконка меню -->
            <div class="icon-close">
                <img src="{{ asset('images/close-btn.png') }}">
            </div>
            <!-- Меню -->
            <ul>
                <li><a href="{{ url('admin/product') }}">Товары</a></li>
                <li><a href="{{ url('admin/category') }}">Категории</a></li>
                <li><a href="{{ url('admin/partner') }}">Контрагенты</a></li>
                <li><a href="{{ url('admin/storage') }}">Склады</a></li>
            </ul>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{ asset('js/menu.js') }}" defer></script>
</body>
</html>
