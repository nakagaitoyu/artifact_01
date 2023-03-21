<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アニメ検索ページ</title>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    </head>
    <body>
        <a href="/">投稿一覧へ戻る</a>
        <h1 class="title">ANNECTION</h1>
        <h2 class="serch" text align=center>アニメ名検索ページ</h2>
        <form action="/search/result" method="POST" text align=center>
            @csrf
            <input type="text" name="keyword" >
            <input type="submit" value="検索する"/>
        </form>
        <div class="animes" text align="center">
            @if(isset($animes))
                @foreach($animes as $anime)
                <a href="/anime/{{ $anime->id }}">{{ $anime->name }}</a>
                @endforeach
            @endif
        </div>
    </body>
</html>