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
                      <th>{{ $item->name_and_age }}</th>
               </tr>
           @endforeach
         </table>
    </ol>
    <hr>
</body>

</html>