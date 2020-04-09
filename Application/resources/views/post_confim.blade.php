<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOT FOUND</title>
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('header')

        <div class="contents">
            この口コミを投稿しますか？
        </div>
        <div class="confirm">
            <form action="/post_confirm" method="POST">
                <input type="hidden" name="formInfo" value="{{$form_info}}">
                <input type="hidden" name="confirm" value=1>
                <input type="submit" value="はい" class="button">
                <a href="/" class="button">いいえ</a>
            </form>
        </div>
    </div>
</body>
</html>