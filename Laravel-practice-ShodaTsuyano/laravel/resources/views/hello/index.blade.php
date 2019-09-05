<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Index</title>
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <form action="/hello" method="post">
            @csrf
            <div>NAME:<input type="text" name="name"></div>
            <div>MAIL:<input type="text" name="mail"></div>
            <div>TEL:<input type="text" name="tel"></div>
            <input type="submit">
    </form>
    <hr>
    <ol>
    @for($i = 0; $i < count($keys); $i++)
        <li>{{ $keys[$i] }}:{{ $values[$i] }}</li>
    @endfor
</body>
</html>