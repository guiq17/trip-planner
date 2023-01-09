<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p>イベント名</p>
  <p>2022/1/1~2022/1/8</p>
  <div>
    <a href="{{route('destination.add', ['travel_id' => $travel->id])}}">
      <button>日程追加</button>
    </a>
  </div>
</body>
</html>