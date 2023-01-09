<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <form action="/travels/create" class="flex mb-30" method="post">
          @csrf
          @error('title')
          <ul>
            <li>{{$message}}</li>
          </ul>
          @enderror
          <label for="title" class="mb-5">タイトル</label>
          <input type="text" class="input-add" name="title">
          <div class="date">
            <div class="start-date">
              @error('start_date')
              <ul>
                <li>{{$message}}</li>
              </ul>
              @enderror
              <label for="start_date" class="mb-5">日付</label>
              <input type="date" class="input-add-date" name="start_date" id="start_date">
            </div>
            <div class="end-date">
              @error('end_date')
              <ul>
                <li>{{$message}}</li>
              </ul>
              @enderror
              <label for="end_date" class="mb-5">開始時間</label>
              <input type="date" class="input-add-date" name="end_date" id="end_date">
            </div>
          </div>
          <label for="memo" class="mb-5">メモ</label>
          <textarea name="textarea" id="" cols="30" rows="10"></textarea>
          <input type="submit" class="button-add" value="追加">
        </form>
  </div>
</body>
</html>