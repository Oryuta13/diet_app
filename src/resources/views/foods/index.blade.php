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
    <h1 class="text-2xl font-bold mb-4">あなたの食事記録</h1>
    <div class="mb-4">
      @if(session()->has('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded">{{ session('success') }}</div>
      @endif
    </div>
    <div class="mb-4">
      <a href="{{ route('foods.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">食事を追加する</a>
    </div>
    <div class="mb-4">
      <form method="get" action="{{ route('foods.index') }}" class="flex items-center">
        <label for="date" class="mr-2">日付を選択:</label>
        <input type="date" id="date" name="date" value="{{ $selectedDate }}" class="border rounded px-2 py-1">
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">表示する</button>
      </form>
    </div>
    <table class="border-collapse border w-full">
      <thead>
        <tr class="bg-gray-200">
          <th class="border p-2">#</th>
          <th class="border p-2">名前</th>
          <th class="border p-2">タンパク質</th>
          <th class="border p-2">脂質</th>
          <th class="border p-2">炭水化物</th>
          <th class="border p-2">カロリー</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($foods as $food )
        <tr>
          <td class="border p-2">{{ $food->id }}</td>
          <td class="border p-2">{{ $food->name }}</td>
          <td class="border p-2">{{ $food->protein }}</td>
          <td class="border p-2">{{ $food->fat }}</td>
          <td class="border p-2">{{ $food->carbo }}</td>
          <td class="border p-2">{{ $food->kcal }}</td>
          <td class="border p-2">
            <a href="{{ route('foods.edit', ['food' => $food]) }}" class="text-blue-500 hover:underline">編集</a>
          </td>
          <td class="border p-2">
            <form method="post" action="{{ route('foods.destroy', ['food' => $food]) }}">
              @csrf
              @method('delete')
              <button type="submit" class="text-red-500 hover:underline">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
