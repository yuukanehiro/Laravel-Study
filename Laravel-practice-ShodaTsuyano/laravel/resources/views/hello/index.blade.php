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
            <input type="text" name="msg">
            <input type="submit">
    </form>
</body>
</html>