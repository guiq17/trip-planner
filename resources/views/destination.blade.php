<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="/css/destination/style.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <a href="{{route('index')}}" class="back_btn">戻る</a>
      <div>
        <h3 class="trip-title">{{$travel->title}}</h3>
        <p class="trip-period">{{$travel->start_date. '〜'. $travel->end_date}}</p>
      </div>
      <div>
        <a href="{{route('destination.add', ['travel_id' => $travel->id])}}">
          <button class="button-add-detail">日程追加</button>
        </a>
      </div>
      <div>
        @foreach($grouped_travels as $key => $destinations)
        <p class="itinerary-date">{{$key}}</p>
          @foreach($destinations as $destination)
          <div class="list">
            <div class="edit">
              <form action="/destinations/edit" method="post">
              @csrf
              @error('title')
              <ul>
                <li>{{$message}}</li>
              </ul>
              @enderror
              <input type="hidden" name="destination_id" value="{{$destination->id}}">
              <input type="hidden" name="travel_id" value="{{$destination->travel_id}}">
              <input type="text" class="title" name="title" value="{{$destination->title}}">
              @error('time')
              <ul>
                <li>{{$message}}</li>
              </ul>
              @enderror
              <input type="time" class="time" name="time" value="{{$destination->time}}">
              <input type="text" class="memo" name="memo" value="{{$destination->memo}}">
              <input type="submit" class="button-update" value="更新">
              </form>
            </div>
            <div class="delete">
              <form action="/destinations/delete/{$destination->id}" method="post">
              @csrf
              <input type="hidden" name="travel_id" value="{{$destination->travel_id}}">
              <input type="hidden" name="id" value="{{$destination->id}}">
              <input type="submit" class="button-delete" value="削除">
              </form>
            </div>
          </div>
          @endforeach
        @endforeach
      </div>
    </div>
  </div>
</body>
</html>