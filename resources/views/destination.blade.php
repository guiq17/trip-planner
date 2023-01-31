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
      <div class="">
        <div>
          <a href="{{route('index')}}" class="back_btn">戻る</a>
          <h3>{{$travel->title}}</h3>
          <p class="">{{$travel->start_date. '〜'. $travel->end_date}}</p>
        </div>
        <div>
          <a href="{{route('destination.add', ['travel_id' => $travel->id])}}">
            <button>日程追加</button>
          </a>
        </div>
      </div>
      <div>
      @foreach($grouped_travels as $key => $destinations)
        <p>{{$key}}</p>
        @foreach($destinations as $destination)
          <form action="/destinations/edit" method="post">
          @csrf
          <input type="hidden" name="destination_id" value={{$destination->id}}>
          <input type="hidden" name="travel_id" value={{$destination->travel_id}}>
          <input type="text" class="input-update" name="title" value={{$destination->title}}>
          <input type="time" class="" name="time" value="{{$destination->time}}">
          <input type="text" class="" name="memo" value="{{$destination->memo}}">
          <input type="submit" class="button-update" value="更新">
          </form>
          <form action="/destinations/delete/{$destination->id}" method="post">
          @csrf
          <input type="hidden" name="travel_id" value={{$destination->travel_id}}>
          <input type="hidden" name="id" value={{$destination->id}}>
          <input type="submit" class="button-delete" value="削除">
          </form>
          @endforeach
        @endforeach
      </div>
    </div>
  </div>
</body>
</html>