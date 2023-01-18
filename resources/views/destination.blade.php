<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="">
    <div>
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
    @foreach($travel->destinations as $destination)
    <form action="/destinations/edit" method="post">
    @csrf
    <input type="hidden" name="id" value={{$destination->id}}>
    <input type="text" class="input-update" name="title" value={{$destination->title}}>
    <input type="date" class="" name="date" value="{{$destination->date}}">
    <input type="time" class="" name="time" value="{{$destination->time}}">
    <input type="text" class="" name="memo" value="{{$destination->memo}}">
    <input type="submit" class="button-update" value="更新">
    </form>
    <form action="/destinations/delete" method="post">
    @csrf
    <input type="hidden" name="id" value={{$destination->id}}>
    <input type="submit" class="button-delete" value="削除">
    </form>
    @endforeach
  </div>
</body>
</html>