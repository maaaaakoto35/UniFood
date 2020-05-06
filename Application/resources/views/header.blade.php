<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<div class="top">
    {{-- タイトル --}}
    <div class="top-icon">
        @if (Session::has('member_id'))
            　<img src="img/members/log_in.png" alt="">
        @endif
    </div>

    {{-- topページのリンク --}}
    <div class="top-link">
        <a href="{{ route('index') }}">TOPページ</a>
    </div>

    {{-- タイトル --}}
    <div class="title">
        <h1>   　Student Cafeteria</h1>
    </div>
</div>