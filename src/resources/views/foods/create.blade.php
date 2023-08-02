<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Create a Foods</h1>
  <div>
    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>

    @endif
  </div>
  <form method="post" action="{{route('foods.store')}}">
    @csrf
    @method('post')
    <div>
      <label>Name</label>
      <input type="string" name="name" placeholder="Name" />
    </div>
    <div>
      <label>Protein</label>
      <input type="integer" name="protein" placeholder="Protein" />
    </div>
    <div>
      <label>Fat</label>
      <input type="integer" name="fat" placeholder="Fat" />
    </div>
    <div>
      <label>Carbo</label>
      <input type="integer" name="carbo" placeholder="Carbo" />
    </div>
    <div>
      <label>Kcal</label>
      <input type="integer" name="kcal" placeholder="Kcal" />
    </div>
    <div>
      <input type="submit" value="Save a New Foods" />
    </div>

  </form>
</body>
</html>