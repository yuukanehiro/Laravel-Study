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
         <table>
           @foreach($data as $item)
               <tr>
                      <th>{{ $item->id }}</th>
                      <th>{{ $item->name }}</th>
                      <th>{{ $item->mail }}</th>
                      <th>{{ $item->age }}</th>
               </tr>
           @endforeach
         </table>
    </ol>
    <hr>
</body>

</html>