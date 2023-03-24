<!DOCTYPE HTML>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アニメ検索ページ</title>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    </head>
    <body>
        <h1 class="title">ANNECTION</h1>
        <form action="/search/result" method="POST" text align=center style="margin-top:20px;">
            @csrf
            <input type="text" name="keyword" >
            <div>
                <input type="submit" value="検索する" style="color:blue">
            </div>
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
</x-app-layout>