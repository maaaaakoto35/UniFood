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
            <div class="top-link">
                <a href="{{ route('index') }}">TOPページ</a>
            </div>

            {{-- タイトル --}}
            <h1>京都産業大学の食堂</h1>
        </div>

        <div class="main">
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