<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Cafeteria</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.bxslider.js') }}"></script>

    <script type="text/javascript">
            $(document).ready(function(){
                $('.slider').bxSlider({
                    auto: true,
                    pause: 5000,
                    touchEnabled: true,
                    centerMode: true,
                    centerPadding: '10%'
                });
            });
    </script>
</head>
<body>
    <div class="wrapper">
        @include('header')
        <br>

        <div class="main">
            {{-- $is_storeがTRUEの時は店舗検索、FALSEの時はメニュー検索をするようにgetSearchメソッドに飛ぶ --}}
            <div class="search">
                <div class="search_button">
                    <form action="/" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <input id="submit_button" type="submit" value="店舗検索" class="store_button">
                    </form>

                    <form action="/" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="0">
                        <input id="submit_button" type="submit" value="メニュー" class="food_button">
                    </form>
                </div>

                <div class="search_form">
                    @if (isset($is_store))
                        @if ($is_store == 1)
                            <form action="/search" method="POST">
                                @csrf
                                <div class="form_text">
                                    <input type="text" name="store" class="input_text" size="60" placeholder="店舗検索"><br>
                                </div>
                                <input id="submit_button" type="submit" value="検索" class="submit_button">
                            </form>
                        @elseif($is_store == 0)
                            <form action="/search" method="POST">
                                @csrf
                                <div class="form_text">
                                    <input type="text" name="menu" class="input_text" size="60" placeholder="メニュー検索"><br>
                                </div>
                                <input id="submit_button" type="submit" value="検索" class="submit_button"></a>
                            </form>
                        @endif
                    @else
                        <form action="/search" method="POST">
                            @csrf
                            <div class="form_text">
                                <input type="text" name="store" class="input_text" size="60" placeholder="店舗かメニューかを選択してください"><br>
                            </div>
                            <input id="submit_button" type="submit" value="検索" class="submit_button">
                        </form>
                    @endif
                </div>
            </div><br>

            <div class="slider">
                <img src="img/foods/food1.jpg" alt="">
                <img src="img/foods/food2.jpg" alt="">
                <img src="img/foods/food3.jpg" alt="">
                <img src="img/foods/food4.jpg" alt="">
                <img src="img/foods/food5.jpg" alt="">
                <img src="img/foods/food6.jpg" alt="">
                <img src="img/foods/food7.jpg" alt="">
                <img src="img/foods/food8.jpg" alt="">
                <img src="img/foods/food9.jpg" alt="">
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
                    @if ($key == 3)
                        <div class="side_list"><a href="{{ route('post') }}">{{$side}}</a></div>
                    @elseif ($key == 0)
                        <div class="side_list"><a href="{{ route('philosophy') }}">{{$side}}</a></div>
                    @elseif ($key == 1)
                        <div class="side_list"><a href="{{ route('signup') }}">{{$side}}</a></div>
                    @elseif ($key == 2)
                        <div class="side_list"><a href="{{ route('login') }}">{{$side}}</a></div>
                    @endif
                @endforeach
            </div>
        </div>


        {{-- <div class="footer">
            @include('footer')
        </div> --}}
    </div>
</body>
</html>
