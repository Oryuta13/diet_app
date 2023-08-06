<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'DietApp')</title>

        <!-- Header -->
        <header class="bg-amber-400 p-4">
          <nav class="flex justify-between mx-auto px-8 container items-center">
            <div class="font-bangers text-4xl">DietApp</div>
            <div class="space-x-4 font-bold">
                <a
                href="{{ route('register') }}"
                class="hover:text-green-200 transition-all duration-300">新規登録</a>
                <a
                href="{{ route('login') }}"
                class="hover:text-green-200 transition-all duration-300">ログイン</a>
            </div>
          </nav>
      </header>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </body>
</html>
