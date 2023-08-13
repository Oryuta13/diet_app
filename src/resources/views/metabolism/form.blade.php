<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>基礎代謝計算</title>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">基礎代謝計算</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('metabolism.calculate') }}">
                            @csrf

                            <div class="form-group">
                                <label for="gender">性別</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="male">男性</option>
                                    <option value="female">女性</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="weight">体重（kg）</label>
                                <input id="weight" type="number" step="0.01" class="form-control" name="weight" required>
                            </div>

                            <div class="form-group">
                                <label for="height">身長（cm）</label>
                                <input id="height" type="number" step="0.1" class="form-control" name="height" required>
                            </div>

                            <div class="form-group">
                                <label for="age">年齢</label>
                                <input id="age" type="number" class="form-control" name="age" required>
                            </div>

                            <div class="form-group">
                                <label for="activity_level">活動レベル</label>
                                <select id="activity_level" name="activity_level" class="form-control">
                                    <option value="1.3">静的な日常</option>
                                    <option value="1.5">通勤や買い物、家事をしている</option>
                                    <option value="1.7">１時間以上の運動を週５日以上行う</option>
                                    <option value="1.9">１時間以上の激しい運動を週５日以上行う</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">基礎代謝を計算する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
