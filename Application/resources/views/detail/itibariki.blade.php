<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>壱馬力</title>
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
                <img src="{{ asset('img/itibariki/Shokudo.jpg') }}" width="280" height="210" alt="logo">
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
                    「油行こうぜ！！」で本学の在校生や教員だけでなく<br>
                    卒業生からも愛されているラーメン屋。<br>
                    麺とネギだけというシンプルな具材にお好みで味付けができる。<br>
                    一度食べたら離れられない味だが、カロリーが絶対高い<br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>