@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="ja">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TopPage</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
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

      <main>
        <div class="flex flex-col text-center py-10">
          <h1 class="font-rampart text-3xl sm:text-5xl">食事管理で</h1>
          <h2 class="font-rampart text-3xl sm:text-5xl">理想の身体になろう</h2>
        </div>
        <div class="flex items-center justify-center">
          <img class="max-w-full h-auto" src="/imgs/diet_img2.jpg" alt="Diet画像">
        </div>
        <div class="flex items-center justify-center">
          <a
          href=""
          class="px-6 py-3 bg-blue-600 rounded-md text-white hover:bg-blue-800 cursor-pointer transition-all duration-300 w-max">今すぐ始める</a>
        </div>
      </main>
    </body>
    </html>
@endsection