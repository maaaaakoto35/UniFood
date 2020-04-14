<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOT FOUND</title>
    <link rel="stylesheet" href="{{ asset('css/post_confirm.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('header')

        {{-- セッションを保持していないときはpostConfirmに飛べない --}}
        @if (Session::has('message'))
            <div class="contents"><br /><br />
                {{Session::get('message')}}<br /><br />
            </div>
            <div class="confirm">
                <form action="/post_confirm" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="form_info['id']" value="{{$form_info['id']}}">
                    <input type="hidden" name="form_info['title']" value="{{$form_info['title']}}">
                    <input type="hidden" name="form_info['contents']" value="{{$form_info['contents']}}">
                    <input type="hidden" name="form_info['rate']" value="{{$form_info['rate']}}">
                    <input type="hidden" name="form_info['storeJName']" value="{{$form_info['storeJName']}}">
                    <input type="hidden" name="form_info['storeName']" value="{{$form_info['storeName']}}">
                    @if (isset($image))
                        <input type="hidden" name="image_name" value="{{$image['name']}}">
                        <input type="hidden" name="image_path" value="{{$image['path']}}">
                    @endif
                    <input type="hidden" name="confirm" value=1>
                    <input type="submit" value="はい" class="button">
                </form>
            </div>
        @endif
    </div>
</body>
</html>