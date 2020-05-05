<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録</title>
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('header')

        @if ($not_done)
            <div>会員登録に失敗しました。全ての項目に記入して下さい。</div>
        @endif

        <div class="form">
            <form action="/signup" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" size="50" name="name" placeholder="名前">
                <input type="text" size="50" name="e-mail" placeholder="メールアドレス">
                <input type="text" size="50" name="student_number" placeholder="学籍番号(半角英数)">
                <input type="password" size="30" name="password" placeholder="パスワード">
                <input type="file" name="image" class="form-control">
                <input type="submit" value="登録">
            </form>
        </div>
    </div>
</body>
</html>