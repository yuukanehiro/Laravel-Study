<!DOCTYPE html>
<html lang="ja">

<head>
    <title>Index</title>
    <link href="/css/app.css"  rel="stylesheet">
</head>

<body>
    <h1>Hello/Index</h1>
   <p>{{$msg}}</p>
    <div>
    <form action="/hello" method="post">
        @csrf
        ID: <input type="text" id="id" name="id">
        <input type="submit">
    </form>
    </div>
    <hr>
    <table border="1">
    @foreach($data as $item)
    <tr>
        <th>{{$item->id}}</th>
        <td>{{$item->all_data}}</td>
    </tr>
    @endforeach
    </table>
    <hr>
</body>
</html>