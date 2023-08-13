<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>あなたの食事記録</title>
</head>
<body>
  <h1>あなたの食事記録</h1>
  <div>
    @if(session()->has('success'))
      <div>
        {{session('success')}}
      </div>
    @endif
  </div>
  <div>
    <div>
      <a href="{{route('foods.create')}}">食事を追加する</a>
    </div>
    <div>
      <form method="get" action="{{ route('foods.index') }}">
        <label for="date">日付を選択: </label>
        <input type="date" id="date" name="date" value="{{ $selectedDate }}" />
        <button type="submit">表示する</button>
      </form>
    </div>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Protein</th>
        <th>Fat</th>
        <th>Carbo</th>
        <th>Kcal</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
        @foreach ($foods as $food )
        <tr>
          <td>{{$food->id}}</td>
          <td>{{$food->name}}</td>
          <td>{{$food->protein}}</td>
          <td>{{$food->fat}}</td>
          <td>{{$food->carbo}}</td>
          <td>{{$food->kcal}}</td>
          <td>
            <a href="{{route('foods.edit', ['food' => $food])}}">編集</a>
          </td>
          <td>
            <form method="post" action="{{route('foods.destroy', ['food' => $food])}}">
              @csrf
              @method('delete')
              <input type="submit" value="削除" />
            </form>
          </td>
        </tr>
        @endforeach
    </table>
  </div>
</body>
</html>