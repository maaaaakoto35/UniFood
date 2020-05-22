<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BABY FACE PLANET'S</title>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <script type="text/javascript" src="{{ asset('js/detail.js') }}"></script>
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
                <li class="tab tab-A is-active">BABY FACE PLANET'S</li>
                <li class="tab tab-B">メニュー</li>
                <li class="tab tab-C">口コミ</li>
                <li class="tab tab-D">イメージマップ</li>
            </ul>

            <div class="panel-group">
                <div class="panel tab-A is-show">
                    <div class="slider">
                        <img src="{{ asset('img/'.$result["store_name"].'/Shokudo.jpg') }}" alt="logo">
                        <img src="{{ asset('img/'.$result["store_name"].'/food<1>.jpg') }}" alt="logo">
                        <img src="{{ asset('img/'.$result["store_name"].'/food<2>.jpg') }}" alt="logo">
                        <img src="{{ asset('img/'.$result["store_name"].'/Shokudo_baby02.jpg') }}" alt="logo">
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
                        <table>
                            <tr>
                                <td width="25%">ジャンル:</td>
                                <td width="75%">{{$result["genre"]}}</td>
                            </tr>
                            <tr>
                                <td width="25%">価格帯:</td>
                                <td width="75%">{{$result["price"]}}</td>
                            </tr>
                            <tr>
                                <td width="25%">営業時間:</td>
                                <td width="75%">{{$result["open_time"]}}</td>
                            </tr>
                        </table><br>
                        全国に約100店舗を展開する大人気店が大学内に出店。<br>
                        ボリュームたっぷりのオムライスやパスタ等を<br>
                        京都産業大学価格で食べることができる。<br>
                        オムライスは学食の域を超えてる。<br>
                    </div>
                </div>

                <div class="panel tab-B">
                    <table>
                        @foreach ($menus as &$menu)
                            <tr>
                                <td width="50%">
                                    <span>{{$menu["food_name"]}}</span>
                                </td>
                                <td width="50%">
                                    <span>{{$menu["price"]}}円</span><br>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="panel tab-C">
                    @if (isset($posts))
                        @foreach ($posts as $post)
                            <div class="post">
                                <span class="post_name"><span style="color:deepskyblu;">{{$post["name"]}}</span>さんの投稿</span><br>
                                <span class="post_title">{{$post["title"]}}</span>
                                <span class="post_rate">
                                    <div class="rate">
                                        <div class="star-rating-front" style="display: inline-block; width: {{$post['star']}}%">★★★★★</div>
                                        <div class="star-rating-back" style="display: inline-block;">★★★★★</div>
                                    </div> : {{$post["rate"]}}
                                </span><br>
                                <span class="post_contents">{{$post["contents"]}}</span><br>
                                @if (isset($post["img_name"]))
                                    <span class="post_img">
                                        <img src="{{ asset($post["img_path"].$post["img_name"]) }}" width="80%" alt="口コミの画像">
                                    </span>
                                @endif
                            </div><br>
                        @endforeach
                    @else
                        まだ口コミがありません。
                    @endif
                </div>

                <div class="panel tab-D">
                    <div class="map">
                        <img src="{{ asset('img/'.$result["store_name"].'/map.JPG') }}" width="98%" alt="logo">
                    </div>
                    食堂が多くある並楽館4階にあります。<br>
                    長い階段を登った先に美味しいご飯が。
                </div>
            </div>
        </div>
    </div>
</body>
</html>
