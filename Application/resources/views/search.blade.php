<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Cafeteria</title>
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <div class="wrapper">

        @include('header')<br>

        @if (isset($keyword))
            <div class="search">
                <div class="search_button">
                    <form action="/" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="1">
                        <input id="submit_button" type="submit" value="店舗検索" class="store_button">
                    </form>

                    <form action="/" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="0">
                        <input id="submit_button" type="submit" value="メニュー" class="food_button">
                    </form>
                </div>

                @if (isset($button))
                    @if ($button == 1)
                        <form action="/search" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            <div class="form_text">
                                <input type="text" name="store" size="60" value="{{$keyword}}" style="display: inline-block; height: 50px; font-size: large;"><br>
                            </div>
                            <div class="form_button">
                                <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索" class="submit_button"></a>
                            </div>
                        </form>
                    @elseif($button == 0)
                        <form action="/search" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            <div class="form_text">
                                <input type="text" name="menu" size="60" value="{{$keyword}}" style="display: inline-block; height: 50px; font-size: large;"><br>
                            </div>
                            <div class="form_button">
                                <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索" class="submit_button"></a>
                            </div>
                        </form>
                    @endif
                @else
                    <form action="/search" method="POST" style="display: inline-block;">
                        {{ csrf_field() }}
                        <div class="form_text">
                            <input type="text" name="{{$button}}" size="60" value="{{$keyword}}" style="display: inline-block; height: 50px; font-size: large;"><br>
                        </div>
                        <div class="form_text">
                            <a href="{{route('search')}}"><input id="submit_button" type="submit"" value="検索" class="submit_button"></a>
                        </div>
                    </form>
                @endif
            </div>
        @else
            <p>done!!</p>
        @endif

        <div class="amount">
            <p>全{{$amount}}件</p>
        </div>

        @if (isset($button) && isset($result))
            <div class="result">
                @if ($button == 1)
                    @foreach ($result as $key => $value)
                        <a href="/detail/?value={{$value['store_name']}}">
                            <div class="detail">
                                <h2 style="display: inline-block">{{$value['store_jname']}}</h2>
                                <p style="display: inline-block">{{$value['detail']}}/</p>
                                <p style="display: inline-block">{{$value['foods']}}品</p><br>
                            </div>
                            <div class="detail2">
                                <img src="img/{{$value['store_name']}}/Shokudo.jpg" width="240" height="180" alt="" style="display: inline-block">
                                <p style="display: inline-block">場所 {{$value['place']}}</p>
                            </div>
                        </a>
                    @endforeach
                @elseif ($button == 0)
                    @foreach ($result as $key => $value)
                        <a href="/detail/?value={{$value['store_name']}}">
                            <div class="detail">
                                <h2 style="display: inline-block">{{$value['food_name']}}</h2>
                                <h2 style="display: inline-block">{{$value['store_jname']}}</h2>
                                <p style="display: inline-block">{{$value['detail']}}/</p>
                                <p style="display: inline-block">{{$value['foods']}}品</p><br>
                                <h2>{{$value['rate']}}</h2>
                            </div>
                            <div class="detail2">
                                <img src="img/{{$value['store_name']}}/Shokudo.jpg" width="240" height="180" alt="" style="display: inline-block">
                                <p style="display: inline-block">場所 {{$value['place']}}</p>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        @else
            <p>done!!</p>
        @endif
    </div>
</body>
</html>