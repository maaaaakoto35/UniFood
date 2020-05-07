<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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

        <div class="main">
            <div class="content">
                <form action="/login" method="POST">
                    @csrf
                    <div class="form">
                        <input class="ef" size="50" type="text" placeholder="メールアドレス" name="e-mail">
                        <label></label>
                        <span class="focus_line"></span>
                    </div><br><br>
                    <div class="form">
                        <input class="ef" size="30" type="password" placeholder="パスワード" name="password">
                        <label></label>
                        <span class="focus_line"></span>
                    </div><br><br>
                    {{-- <input type="text" size="50" name="e-mail" placeholder="メールアドレスを入力して下さい">
                    <input type="password" size="30" name="password" placeholder="パスワード"> --}}
                    <input type="submit" id="submit_button" value="ログイン">
                </form>
            </div>
        </div>

        <div class="sign_up_link">
            <a href="{{ route('signup') }}">会員登録はこちら</a>
        </div>
    </div>
</body>
</html>