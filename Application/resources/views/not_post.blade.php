<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faild posting</title>
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('header')
        <div class="contents" style="text-align: center;">
            口コミ投稿に失敗しました、再度試してください。
        </div>

        <div class="link">
            <a href="{{ route('index') }}">TOPページに戻る</a>
        </div>
    </div>
</body>
</html>