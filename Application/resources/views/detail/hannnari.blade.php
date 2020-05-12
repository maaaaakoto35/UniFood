<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>はんなり食堂</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <script type="text/javascript" src="{{ asset('js/detail.js') }}"></script>
</head>
<body>
    <div class="wrapper">
        @include('header')<br>

        <div class="pre_top">
            <div class="store_title">
                <h1>{{$result["store_jname"]}}</h1>
            </div>

            @if ($star)
                <div class="rate">
                    <div class="star-rating-front" style="display: inline-block; width: {{$star}}%">★★★★★</div>
                    <div class="star-rating-back" style="display: inline-block;">★★★★★</div>
                </div> : {{$result["rate"]}}
            @else
                <div class="rate">
                    <div class="star-rating-back" style="display: inline-block;">★★★★★</div> : まだ口コミがありません
                </div>
            @endif
        </div>
       
       <div class="tab-panel">
            <ul class="tabs-group">
                <li class="tab tab-A is-active">はんなり食堂</li>
                <li class="tab tab-B">メニュー</li>
                <li class="tab tab-C">口コミ</li>
            </ul>

            <div class="panel-group">
                <div class="panel tab-A is-show">
                    <ul>
                        <img src="{{ asset('img/'.$result["store_name"].'/Shokudo.jpg') }}" width="280" height="210" alt="logo">
                        {{-- <img src="img/foods/food2.jpg" width="240" height="180" alt="">
                        <img src="img/foods/food3.jpg" width="240" height="180" alt="">
                        <img src="img/foods/food4.jpg" width="240" height="180" alt="">
                        <img src="img/foods/food5.jpg" width="240" height="180" alt="">
                        <img src="img/foods/food6.jpg" width="240" height="180" alt="">
                        <img src="img/foods/food7.jpg" width="240" height="180" alt="">
                        <img src="img/foods/food8.jpg" width="240" height="180" alt="">
                        <img src="img/foods/food9.jpg" width="240" height="180" alt=""> --}}
                        <table>
                            <tr>ジャンル: {{$result["genre"]}} </tr>
                            <tr>価格帯: {{$result["price"]}} </tr>
                            <tr>営業時間: {{$result["open_time"]}} </tr>
                        </table><br><br>
                        <li>
                            低価格でボリュームある定食が人気の食堂。<br>
                            日替りランチのバリエーションも<br>
                            豊富で、カレー、丼物、麺類の品揃えも充実。<br>
                            味と量に大満足です。うどん安すぎ<br>
                        </li>
                    </ul>
                </div>

                <div class="panel tab-B">
                    @foreach ($menus as &$menu)
                        <span>{{$menu["food_name"]}}</span>
                        <span>{{$menu["price"]}}円</span>
                    @endforeach
                </div>

                <div class="panel tab-C">
                    <h2>{{$result["store_jname"]}}の口コミ</h2>
                    @foreach ($posts as $post)
                        <p>{{$post["title"]}}</p>
                        <p>{{$post["contents"]}}</p>
                        @if (isset($post["img_name"]))
                            <img src="{{ asset($post["img_path"].$post["img_name"]) }}" alt="口コミの画像">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>