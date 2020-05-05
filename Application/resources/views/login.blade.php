<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('header')

        <div class="warnig" style="color:red;">
            @if (isset($not_password))
                パスワードが違います。
            @elseif (isset($not_member))
                メールアドレスが違います。
            @endif
        </div>

        <div class="form">
            <form action="/login" method="POST">
                @csrf
                <input type="text" size="50" name="e-mail" placeholder="メールアドレスを入力して下さい">
                <input type="password" size="30" name="password" placeholder="パスワード">
                <input type="submit" value="ログイン">
            </form>
        </div>
    </div>
</body>
</html>