<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>口コミ投稿</title>
    <link rel="stylesheet" href="css/post.css">
</head>
<body>
    <div class="wrapper">
        @include('header')<br>

        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form_top">
                <h2 style="text-align:center">口コミの投稿</h2>
                <div class="form_name">
                    @if (Session::has('member_id'))
                        <input class="ef" type="text" size="30" placeholder="" name="name" value="{{ session('member_name') }}">
                        <label></label>
                        <span class="focus_line"></span>
                    @else
                        <input class="ef" type="text" size="30" placeholder="名前" name="name">
                        <label></label>
                        <span class="focus_line"></span>
                    @endif
                </div><br><br>
                <div class="form_title">
                    <input class="ef" size="45" type="text" placeholder="タイトル" name="title">
                    <label></label>
                    <span class="focus_line"></span>
                </div>
                <select name="id" size="1">
                    <option value="1">はんなり食堂</option>
                    <option value="2">らーめん壱馬力</option>
                    <option value="3">BABY FACE PLANET'S</option>
                    <option value="4">cosmic bakery cafe</option>
                    <option value="5">MIYAKO製麺</option>
                    <option value="6">ふじカツ</option>
                    <option value="7">むすびキッチン</option>
                    <option value="8">LIBRE（リブレ）</option>
                    <option value="9">ラウンジふるさと</option>
                    <option value="10">FamilyMart</option>
                </select>
                <div style="text-align: center">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            <div class="body">
                <div class="form_contents">
                    <label class="ef">
                        <textarea name="contents" maxlength="190" rows="5" cols="160" placeholder="本文"></textarea><br><br>
                    </label>
                    {{-- <input type="text" name="contents" size="100" placeholder="口コミの内容を記入してください"> --}}
                </div>
                <div class="rate" style="display: inline-block;">
                    <input id="star1" type="radio" name="rate" value="5" />
                    <label for="star1"><span class="text">最高</span>★</label>
                    <input id="star2" type="radio" name="rate" value="4" />
                    <label for="star2"><span class="text">良い</span>★</label>
                    <input id="star3" type="radio" name="rate" value="3" />
                    <label for="star3"><span class="text">普通</span>★</label>
                    <input id="star4" type="radio" name="rate" value="2" />
                    <label for="star4"><span class="text">悪い</span>★</label>
                    <input id="star5" type="radio" name="rate" value="1" />
                    <label for="star5"><span class="text">最悪</span>★</label>
                </div><br><br>
                <input type="submit" value="送信" class="submit_button">
            </div>
        </form>

        {{-- <div class="posts">
            @foreach ($result as $value)
                <p>{{$value["title"]}}</p>
                <p>{{$value["contents"]}}</p>
                <p>{{$value["store_jname"]}}</p>
                <p>{{$value["rate"]}}</p>
            @endforeach
        </div> --}}
    </div>
</body>
</html>
