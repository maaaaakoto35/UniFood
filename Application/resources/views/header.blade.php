<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<div class="top">
    {{-- タイトル --}}
    @if (Session::has('member_id'))
        <div class="icon">
            ログイン中
        </div>
    @endif

    {{-- topページのリンク --}}
    <div class="top-ink" style="float: right;">
        <a href="{{ route('index') }}">TOPページ</a>
    </div>

    {{-- タイトル --}}
    <div class="title">
        <h1>   　Student Cafeteria</h1>
    </div>
</div>