<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Cafeteria</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script type="text/javascript">
            $(document).ready(function(){
                $('.slider').bxSlider({
                    auto: true,
                    pause: 5000,
                    centerMode: true,
                    centerPadding: '10%'
                });
            });
    </script>
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
                        <input type="text" name="store" size="60" placeholder="店舗かメニューかを選択してください"><br>
                        <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索"></a>
                    </form>
                @endif
            </div>

            <div class="slider">
                <img src="img/foods/food1.jpg" width="240" height="180" alt="">
                <img src="img/foods/food2.jpg" width="240" height="180" alt="">
                <img src="img/foods/food3.jpg" width="240" height="180" alt="">
                <img src="img/foods/food4.jpg" width="240" height="180" alt="">
                <img src="img/foods/food5.jpg" width="240" height="180" alt="">
                <img src="img/foods/food6.jpg" width="240" height="180" alt="">
                <img src="img/foods/food7.jpg" width="240" height="180" alt="">
                <img src="img/foods/food8.jpg" width="240" height="180" alt="">
                <img src="img/foods/food9.jpg" width="240" height="180" alt="">
            </div>

            {{-- 食堂の表示 --}}
            {{-- <div class="show_stores">
                @foreach ($stores as $key => $store)
                    <p>店名 {{$store['store_name']}}</p>
                    <div><img src="img/{{$store['store_name']}}/Shokudo.jpg" alt="食堂"></div>
                @endforeach
            </div> --}}

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