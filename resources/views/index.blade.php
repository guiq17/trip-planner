<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <img src="img/summer_travel.jpg" alt="" class="container-img">
    <div class="nav">
      <ul>
        <li>
          
        </li>
      </ul>
    </div>
    <div class="card">
      <p class="title">旅のしおり</p>
      <div class="travel">
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
              <label for="start_date" class="mb-5">開始日</label>
              <input type="date" class="input-add-date" name="start_date" id="start_date">
            </div>
            <div class="end-date">
              @error('end_date')
              <ul>
                <li>{{$message}}</li>
              </ul>
              @enderror
              <label for="end_date" class="mb-5">終了日</label>
              <input type="date" class="input-add-date" name="end_date" id="end_date">
            </div>
          </div>
          <div>
            <input type="submit" class="button-add" value="追加">
          </div>
        </form>
        <table>
          <tr>
            <th>イベント一覧</th>
            <th>更新</th>
            <th>削除</th>
            <th>詳細</th>
          </tr>
          @foreach($travels as $travel)
          <tr>
            <form action="/travels/edit" method="post">
              @csrf
              <td class="list">
                <input type="hidden" name="id" value="{{$travel->id}}">
                <input type="text" class="input-update" name="title" value="{{$travel->title}}">
                <div class="date-update">
                  <input type="hidden" name="id" value="{{$travel->id}}">
                  <input type="date" class="input-date-update" name="start_date" value="{{$travel->start_date}}">
                  <input type="date" class="input-date-update" name="end_date" value="{{$travel->end_date}}">
                </div>
              </td>
              <td class="btn">
                <input type="submit" class="button-update" value="更新">
              </td>
            </form>
            <form action="/travels/delete" method="post">
              @csrf
              <td class="btn">
                <input type="hidden" name="id" value="{{$travel->id}}">
                <input type="submit" class="button-delete" value="削除">
              </td>
              <td class="btn">
                <a href="{{route('destination.index', ['travel_id' => $travel->id])}}">
                  <button type="button" class="button-detail" value="詳細">詳細</button>
                </a>
              </td>
            </form>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>