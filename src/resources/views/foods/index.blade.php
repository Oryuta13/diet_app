<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>あなたの食事記録</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
  <div class="container mx-auto p-4">
    <h1 class="flex justify-center text-2xl font-bold mb-4">あなたの食事記録</h1>
    <div class="mb-4">
      @if(session()->has('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded">{{ session('success') }}</div>
      @endif
    </div>
    <div class=" flex justify-end mb-4">
      <a href="{{ route('foods.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">食事を追加</a>
    </div>
    <div class="flex justify-center mb-4">
      <form method="get" action="{{ route('foods.index') }}" class="flex items-center">
        <label for="date" class="mr-2">日付を選択:</label>
        <input type="date" id="date" name="date" value="{{ $selectedDate }}" class="border rounded px-2 py-1">
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">表示</button>
      </form>
    </div>
    <table class="border-collapse border w-full">
    <thead>
      <tr class="bg-blue-400">
        <th class="border p-2 text-center border-r">食品名</th>
        <th class="border p-2 text-center border-r">タンパク質</th>
        <th class="border p-2 text-center border-r">脂質</th>
        <th class="border p-2 text-center border-r">炭水化物</th>
        <th class="border p-2 text-center border-r">カロリー</th>
        <th class="border p-2 text-center border-r">操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($foods as $food )
      <tr>
        <td class="border p-2 text-center border-r">{{ $food->name }}</td>
        <td class="border p-2 text-center border-r">{{ $food->protein }}g</td>
        <td class="border p-2 text-center border-r">{{ $food->fat }}g</td>
        <td class="border p-2 text-center border-r">{{ $food->carbo }}g</td>
        <td class="border p-2 text-center border-r">{{ $food->kcal }}kcal</td>
        <td class="border p-2">
          <div class="flex justify-center">
            <a href="{{ route('foods.edit', ['food' => $food]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded-full mr-2">編集</a>
            <form method="post" action="{{ route('foods.destroy', ['food' => $food]) }}">
              @csrf
              @method('delete')
              <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded-full">削除</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    <h2 class="text-lg font-semibold mb-2">摂取栄養素の合計</h2>
    <p>タンパク質: {{ $totalProtein }}g</p>
    <p>脂質: {{ $totalFat }}g</p>
    <p>炭水化物: {{ $totalCarbo }}g</p>
    <p>カロリー: {{ $totalKcal }}kcal</p>
  </div>
</body>
</html>
