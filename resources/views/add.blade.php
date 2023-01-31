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
      <div>
        <a href="{{route('destination.index', ['travel_id' => $travel->id])}}" class="back_btn">戻る</a>
        <form action="/destinations/create" class="flex mb-30" method="post">
          @csrf
          @error('title')
          <ul>
            <li>{{$message}}</li>
          </ul>
          @enderror
          <input type="hidden" name="travel_id" value="{{$travel->id}}">
          <label for="title" class="mb-5">タイトル</label>
          <input type="text" class="input-add" name="title">
          <div class="date">
            @error('date')
            <ul>
              <li>{{$message}}</li>
            </ul>
            @enderror
            <label for="date" class="mb-5">日付</label>
            <input type="date" class="input-add-date" name="date" id="date">
          </div>
          <div class="time">
            @error('time')
            <ul>
              <li>{{$message}}</li>
            </ul>
            @enderror
            <label for="time" class="mb-5">開始時間</label>
            <input type="time" class="input-add-date" name="time" id="time">
          </div>
          <label for="memo" class="mb-5">メモ</label>
          <textarea name="memo" id="" cols="30" rows="10"></textarea>
          <input type="submit" class="button-add" value="追加">
        </form>
      </div>
    </div>
  </div>
</body>
</html>