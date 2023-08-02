<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Edit a Foods</h1>
  <div>
    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>

    @endif
  </div>
  <form method="post" action="{{route('foods.update', ['food' => $food])}}">
    @csrf
    @method('put')
    <div>
      <label>Name</label>
      <input type="string" name="name" placeholder="Name" value="{{$food->name}}" />
    </div>
    <div>
      <label>Protein</label>
      <input type="integer" name="protein" placeholder="Protein" value="{{$food->protein}}"/>
    </div>
    <div>
      <label>Fat</label>
      <input type="integer" name="fat" placeholder="Fat" value="{{$food->fat}}" />
    </div>
    <div>
      <label>Carbo</label>
      <input type="integer" name="carbo" placeholder="Carbo" value="{{$food->carbo}}" />
    </div>
    <div>
      <label>Kcal</label>
      <input type="integer" name="kcal" placeholder="Kcal" value="{{$food->kcal}}" />
    </div>
    <div>
      <input type="submit" value="Update" />
    </div>

  </form>
</body>
</html>