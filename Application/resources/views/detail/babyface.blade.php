<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BABY FACE PLANET'S</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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

        <div class="contents">
            <div class="slider">
                <img src="{{ asset('img/'.$result["store_name"].'/Shokudo.jpg') }}" width="280" height="210" alt="logo">
                {{-- <img src="img/foods/food2.jpg" width="240" height="180" alt="">
                <img src="img/foods/food3.jpg" width="240" height="180" alt="">
                <img src="img/foods/food4.jpg" width="240" height="180" alt="">
                <img src="img/foods/food5.jpg" width="240" height="180" alt="">
                <img src="img/foods/food6.jpg" width="240" height="180" alt="">
                <img src="img/foods/food7.jpg" width="240" height="180" alt="">
                <img src="img/foods/food8.jpg" width="240" height="180" alt="">
                <img src="img/foods/food9.jpg" width="240" height="180" alt=""> --}}
            </div>

            <div class="detail">
                <div class="common">
                    <table>
                        <tr>ジャンル: {{$result["genre"]}} </tr>
                        <tr>価格帯: {{$result["price"]}} </tr>
                        <tr>営業時間: {{$result["open_time"]}} </tr>
                    </table><br><br>
                </div>

                <div class="sentense">
                    全国に約100店舗を展開する大人気店が大学内に出店。<br>
                    ボリュームたっぷりのオムライスやパスタ等を<br>
                    京都産業大学価格で食べることができる。<br>
                    オムライスは学食の域を超えてる。<br>
                </div>
            </div>
        </div>

        <div class="menus">
            @foreach ($menus as &$menu)
                <span>{{$menu["food_name"]}}</span>
                <span>{{$menu["price"]}}円</span>
            @endforeach
        </div>

        <div class="review">
            <h2>{{$result["store_jname"]}}の口コミ</h2>
            @foreach ($posts as $post)
                <p>{{$post["title"]}}</p>
                <p>{{$post["contents"]}}</p>
            @endforeach
        </div>
    </div>
</body>
</html>