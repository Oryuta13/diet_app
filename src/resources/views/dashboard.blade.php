<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UserTopPage</title>
  <!-- Header -->
  <header class="bg-amber-400 p-4">
    <nav class="flex justify-between mx-auto px-8 container items-center">
      <div class="font-bangers text-4xl">DietApp</div>
      <!-- ログインしている場合のみ表示 -->
      @auth
        <div class="text-black flex items-center">
          ようこそ{{ Auth::user()->name }}さん
          <form action="{{ route('logout') }}" method="POST" class="ml-4">
            @csrf
            <button type="submit" class="underline">ログアウト</button>
          </form>
        </div>
      @endauth
    </nav>
  </header>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <div class="container">
    <h1>マイページ</h1>
    <ul>
      <li><a href="{{ route('foods.index') }}">食事内容を追加する</a></li>
      <li><a href="{{ route('metabolism.form') }}">あなたの基礎代謝を計算する</a></li>
    </ul>
  </div>
</body>
</html>