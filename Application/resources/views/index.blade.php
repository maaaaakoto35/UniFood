<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>店の表示</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="wrapper">
        <div class="top">
            {{-- topページのリンク --}}
            <div class="top-_ink">
                <a href="{{ route('index') }}">TOPページ</a>
            </div>

            {{-- タイトル --}}
            <h1>Student Cafeteria</h1>
        </div>

        <div class="main">
            {{-- $is_storeがTRUEの時は店舗検索、FALSEの時はメニュー検索をするようにgetSearchメソッドに飛ぶ --}}
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
                    <p>{{$is_store}}</p>
                    @if ($is_store == 1)
                        <form action="/search" method="POST">
                            <input type="text" name="store" size="60" placeholder="店舗検索"><br>
                            <input id="submit_button" type="submit"" value="検索">
                        </form>
                    @elseif($is_store == 0)
                        <form action="/search" method="POST">
                            <input type="text" name="store" size="60" placeholder="メニュー"><br>
                            <input id="submit_button" type="submit"" value="検索">
                        </form>
                    @endif
                @endif
            </div>

            {{-- 食堂の表示 --}}
            <div class="show_stores">
                @foreach ($stores as $key => $store)
                    <p>店名 {{$store['store_name']}}</p>
                    <div><img src="img/{{$store['store_name']}}/Shokudo.jpg" alt="食堂"></div>
                @endforeach
            </div>

            {{-- サイドバー --}}
            <div class="side">
                @foreach ($side_list as $key => $side)
                    <p><a href="">{{$side}}</a></p>
                @endforeach
            </div>
        </div>

        {{-- <div class="footer">
            @include('footer')
        </div> --}}
    </div>
</body>
</html>