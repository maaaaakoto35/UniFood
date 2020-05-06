<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<div class="top">
    {{-- topページのリンク --}}
    <div class="top-link">
        <a href="{{ route('index') }}">TOPページ</a>
    </div>

    {{-- タイトル --}}
    <div class="top-icon">
        @if (Session::has('member_id'))
            <img src="img/members/log_in.png" alt="" height="20px">
        @else
            <img src="img/members/log_out.png" alt="" height="20px">
        @endif
    </div>

    {{-- タイトル --}}
    <div class="title">
        <h1>   　Student Cafeteria</h1>
    </div>
</div>