<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>店の表示</title>
</head>
<body>
    <p>京都産業大学の店</p>
    @foreach ($stores as $key => $store){
        echo $store;
    }
    @endforeach
</body>
</html>