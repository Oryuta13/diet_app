<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Foods</h1>
  <div>
    @if(session()->has('success'))
      <div>
        {{session('success')}}
      </div>
    @endif
  </div>
  <div>
    <div>
      <a href="{{route('foods.create')}}">Create a Food</a>
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
            <a href="{{route('foods.edit', ['food' => $food])}}">Edit</a>
          </td>
          <td>
            <form method="post" action="{{route('foods.destroy', ['food' => $food])}}">
              @csrf
              @method('delete')
              <input type="submit" value="Delete" />
            </form>
          </td>
        </tr>
        @endforeach
    </table>
  </div>
</body>
</html>