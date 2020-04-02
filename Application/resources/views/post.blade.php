<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>口コミ投稿</title>
</head>
<body>
    <div class="wrapper">
        @include('header')<br>

        <form action="/post" method="POST">
            @csrf
            <div class="top">
                <h2>口コミ</h2>
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
            </div>

            <div class="body">
                <input type="text" name="title" size="30" placeholder="タイトル">
                <input type="text" name="contents" size="100" placeholder="口コミの内容を記入してください">
                <input type="text" name="rate" size="5" placeholder="星">
                <input type="submit" value="送信">
            </div>
        </form>

        <div class="posts">
            @foreach ($result as $value)
                <p>{{$value["title"]}}</p>
                <p>{{$value["contents"]}}</p>
                <p>{{$value["store_jname"]}}</p>
                <p>{{$value["rate"]}}</p>
            @endforeach
        </div>
    </div>
</body>
</html>