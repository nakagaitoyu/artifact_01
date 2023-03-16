<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>アニメ名検索ページ</h1>
        <form action="/search/result" method="POST">
            @csrf
            <input type="text" name="keyword" >
            <input type="submit" value="検索する"/>
        </form>
        <div class="animes">
            @if(isset($animes))
                @foreach($animes as $anime)
                <a href="/anime/{{ $anime->id }}">{{ $anime->name }}</a>
                @endforeach
            @endif
        </div>
    </body>
</html>