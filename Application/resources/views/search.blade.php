<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Cafeteria</title>
</head>
<body>
    <div class="wrapper">
        <h1>検索結果</h1>

        @if (isset($keyword) && isset($result))
            <div class="search">
                <form action="/" method="POST">
                    {{ csrf_field() }}
                    <div class="store_button">
                        <input type="hidden" name="id" value="1">
                        <input id="submit_button" type="submit" value="店舗検索">
                    </div>
                </form>

                <form action="/" method="POST">
                    {{ csrf_field() }}
                    <div class="food_button">
                        <input type="hidden" name="id" value="0">
                        <input id="submit_button" type="submit" value="メニュー">
                    </div>
                </form>

                @if (isset($is_store))
                    @if ($is_store == 1)
                        <form action="/search" method="POST">
                            <input type="text" name="store" size="60" placeholder="店舗検索"><br>
                            <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索"></a>
                        </form>
                    @elseif($is_store == 0)
                        <form action="/search" method="POST">
                            <input type="text" name="menu" size="60" placeholder="メニュー検索"><br>
                            <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索"></a>
                        </form>
                    @endif
                @else
                    <form action="/search" method="POST">
                        <input type="text" name="{{$button}}" size="60" value="{{$keyword}}"><br>
                        <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索"></a>
                    </form>
                @endif
            </div>
        @else
            <p>done!!</p>
        @endif
    </div>
</body>
</html>