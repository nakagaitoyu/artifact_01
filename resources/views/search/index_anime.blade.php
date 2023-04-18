<!DOCTYPE HTML>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アニメ検索ページ</title>
        <link rel="stylesheet" href="{{ asset('css/search.css') }}">
        
    </head>
    <body>
        <div>
            <h1 class="title1">ANNIME</h1>
            <form action="/result_anime" method="GET" text align="center" style="margin-top:20px;">
                @csrf
                <input class="textbox" type="text" placeholder="アニメ名を入力" name="keyword_anime[name]" value="{{ old('keyword_anime.name') }}" >
                <p class="keyword_anime__error" style="color:red">{{ $errors->first('keyword_anime.name') }}</p>
                <div class="btn-square-soft1">
                    <input type="submit" value="検索する" style="color:white; font-weight:bold; font-size:20px; border;" >
                </div>
            </form>
            <div class="animes" text align="center">
                @if(isset($animes[0])) 
                    <p style="margin-top:3em; font-size:20px; color:#fa8787; font-weight:bold;">検索結果</p>
                    @foreach($animes as $anime)
                    <span style="display:block; font-size:20px; margin:10px; font-weight:bold;"><a href="/anime/{{ $anime->id }}">{{ $anime->name }}</a></span>
                    @endforeach
                @else
                    @if($status == 1)
                    <p style="margin-top:2em; color:#fa8787; font-weight:bold;">該当のアニメが存在しません</p>
                    @endif
                @endif
            </div>   
        </div>
        
    </body>
</html>
</x-app-layout>