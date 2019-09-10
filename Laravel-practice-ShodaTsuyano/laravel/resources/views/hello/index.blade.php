<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Index</title>
    <link href="/css/app.css"  rel="stylesheet">
</head>

<body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <ol>
           @foreach($data as $item)
               <li>ID:{{ $item->id }} {{ $item->name }} [{{ $item->mail }}, {{$item->age}}]</li>
           @endforeach
    </ol>
    {!! $paginator->link() !!}
    <hr>
</body>

</html>