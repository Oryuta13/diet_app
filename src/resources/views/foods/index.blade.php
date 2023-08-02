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
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Protein</th>
        <th>Fat</th>
        <th>Carbo</th>
        <th>Kcal</th>
      </tr>
      @foreach($foods as $food )
        <tr>
          <td>{{$food->id}}</td>
          <td>{{$food->name}}</td>
          <td>{{$food->protein}}</td>
          <td>{{$food->fat}}</td>
          <td>{{$food->carbo}}</td>
          <td>{{$food->kcal}}</td>
        </tr>
      @endforeach
    </table>
  </div>
</body>
</html>