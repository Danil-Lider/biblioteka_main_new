<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        


    </head>
    <body class="font-sans antialiased">
        <div class="">
         
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('catalog.index') }}">Библиотека</a>
                    @if(Auth::check())
                        <div class='navbar-brand'>Имя пользователя: {{ Auth::user()->name }}</div>
                        <a class="navbar-brand" href="{{ route('profile.edit') }}">Профиль</a>
                        <form class="navbar-brand" id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link" type="submit">
                                Выйти  
                            </button>
                        </form>
                    @else
                        <a class="navbar-brand" href="{{ route('register') }}">Регистрация</a>
                        <a class="navbar-brand" href="{{ route('login') }}">Авторизация</a>
                    @endif 
                </div>
            </nav>
          

            <!-- Page Content -->
            <main>

                @yield('content')
             
            </main>
        </div>
    </body>
</html>