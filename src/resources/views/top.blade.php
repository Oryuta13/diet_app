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
        <a href="" class="hover:text-green-200 transition-all duration-300">新規登録</a>
        <a href="" class="hover:text-green-200 transition-all duration-300">ログイン</a>
      </div>
    </nav>
  </header>

  <main>
    <div class="min-h-screen flex items-center justify-end">
      <img class="object-right h-72 sm:h-auto sm:w-auto max-w-full" src="/img/diet_img2.jpg" alt="Diet背景画像">
    </div>
    <div>
      <div>
        <h1 class="font-rampart text-3xl sm:text-5xl">食事管理で</h1>
        <h2 class="font-rampart text-3xl sm:text-5xl">理想の身体になろう</h2>
      </div>
    </div>
  </main>

</body>
</html>

<!-- 一旦セーブしてる -->
<!-- <div class="min-h-screen flex items-center justify-end">
  <img class="object-scale-down h-72 w-144 sm:w-auto sm:h-auto" src="/img/diet_img2.jpg" alt="Diet背景画像">
</div> -->