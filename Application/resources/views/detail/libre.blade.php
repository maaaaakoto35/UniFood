<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libre</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('header')<br>

        <div class="pre_top">
            <div class="store_title">
                <h1>{{$result["store_jname"]}}</h1>
            </div>

            <div class="rate">
                <p>rate: {{$result["rate"]}}</p>
            </div>
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
                    ビュッフェスタイルを中心に低価格で多種多様なメニュー。<br>
                    平日は朝8時30分から夜20時まで営業なので、<br>
                    一人暮らしの学生の強い味方。<br>
                    朝食からぜひご利用ください。<br>
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
            <h1>口コミの表示</h1>
        </div>
    </div>
</body>
</html>