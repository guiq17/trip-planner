<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="/css/add/style.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <a href="{{route('destination.index', ['travel_id' => $travel->id])}}" class="back_btn">戻る</a>
      <div class="flex">
        <form action="/destinations/create" method="post">
          @csrf
          <div>
            @error('title')
            <ul>
              <li>{{$message}}</li>
            </ul>
            @enderror
            <div class="create">
              <input type="hidden" name="travel_id" value="{{$travel->id}}">
              <label for="title">タイトル</label>
              <input type="text" class="title" name="title">
            </div>
            @error('date')
            <ul>
              <li>{{$message}}</li>
            </ul>
            @enderror
            <div class="create">
              <label for="date">日付</label>
              <input type="date" class="date" name="date" id="date">
            </div>
            @error('time')
            <ul>
              <li>{{$message}}</li>
            </ul>
            @enderror
            <div class="create">
              <label for="time">開始時間</label>
              <input type="time" class="time" name="time" id="time">
            </div>
            <div class="create">
              <label for="memo">メモ</label>
              <textarea name="memo" id="" cols="30" rows="10" class="memo"></textarea>
            </div>
          </div>
          <div>
            <input type="submit" class="button-add" value="追加">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>