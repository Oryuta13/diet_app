<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>食事内容を追加する</title>
</head>
<body>
  <h1>食事内容を追加する</h1>
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
      <label>食品名</label>
      <input type="string" name="name" placeholder="食品名" />
    </div>
    <div>
      <label>タンパク質</label>
      <input type="integer" name="protein" placeholder="タンパク質" />
    </div>
    <div>
      <label>脂質</label>
      <input type="integer" name="fat" placeholder="脂質" />
    </div>
    <div>
      <label>炭水化物</label>
      <input type="integer" name="carbo" placeholder="炭水化物" />
    </div>
    <div>
      <label>カロリー</label>
      <input type="integer" name="kcal" placeholder="Kcal" />
    </div>
    <div>
      <input type="submit" value="Foodを追加する" />
    </div>

  </form>
</body>
</html>