<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Cafeteria</title>
    <link rel="stylesheet" href="/detail/?value= asset('css/index.css') }}">
    <link rel="stylesheet" href="/detail/?value= asset('css/jquery.bxslider.css') }}">
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

            {{-- <div class="map">
                <img src="img/map/campas_food_map.JPG" usemap="#ImageMap" alt="" width="100%"/>
                <map name="ImageMap">
                    <area shape="rect" coords="240,282,336,332" href="/detail/?value=furusato" alt="" />
                    <area shape="rect" coords="317,61,395,123"  href="/detail/?value=hannnari" alt="" />
                    <area shape="rect" coords="486,67,561,109"  href="/detail/?value=musubi" alt="" />
                    <area shape="rect" coords="454,313,515,351" href="/detail/?value=itibariki" alt="" />
                    <area shape="rect" coords="528,263,574,306" href="/detail/?value=cosmic" alt="" />
                    <area shape="rect" coords="599,273,646,322" href="/detail/?value=fujikatu" alt="" />
                    <area shape="rect" coords="677,265,743,307" href="/detail/?value=familymart" alt="" />
                    <area shape="rect" coords="643,338,730,373" href="/detail/?value=babyface" alt="" />
                    <area shape="rect" coords="593,405,669,458" href="/detail/?value=libre" alt="" />
                    <area shape="rect" coords="471,382,539,441" href="/detail/?value=miyako" alt="" />
                </map>
            </div> --}}

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
                        <div class="side_list"><a href="{{ route('not_found') }}">{{$side}}</a></div>
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
