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

        @if (isset($keyword))
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

                @if (isset($button))
                    @if ($button == 1)
                        <form action="/search" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="store" size="60" value="{{$keyword}}"><br>
                            <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索"></a>
                        </form>
                    @elseif($button == 0)
                        <form action="/search" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="menu" size="60" value="{{$keyword}}"><br>
                            <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索"></a>
                        </form>
                    @endif
                @else
                    <form action="/search" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="{{$button}}" size="60" value="{{$keyword}}"><br>
                        <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索"></a>
                    </form>
                @endif
            </div>
        @else
            <p>done!!</p>
        @endif

        @if (isset($button) && isset($result))
            <div class="result">
                @if ($button == 1)
                    @foreach ($result as $key => $value)
                        <p>店名 {{$value['store_name']}}</p>
                        <p>品数 {{$value['foods']}}</p>
                        <p>場所 {{$value['place']}}</p>
                        <form action="/detail" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$value['store_name']}}" name="value">
                            <a href="/detail/{{$value['store_name']}}"><input type="submit"></a>
                        </form>
                    @endforeach
                @elseif ($button == 0)
                    @foreach ($result as $key => $value)
                        <p>品名 {{$value['food_name']}}</p>
                        <p>店名 {{$value['store_name']}}</p>
                        <form action="/detail" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$value['store_name']}}" name="value">
                            <a href="/detail/{{$value['store_name']}}"><input type="submit"></a>
                        </form>
                    @endforeach
                @endif
            </div>
        @else
            <p>done!!</p>
        @endif
    </div>
</body>
</html>