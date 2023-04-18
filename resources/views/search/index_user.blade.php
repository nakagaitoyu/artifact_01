<!DOCTYPE HTML>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ユーザー検索ページ</title>
        <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    </head>
    <body>
        <h1 class="title2">USER</h1>
        <form action="/result_user" method="GET" text align=center style="margin-top:20px;">
            @csrf
            <input class="textbox" type="text" placeholder="ユーザー名を入力" name="keyword_user[name]" value="{{ old('keyword_user.name') }}" >
            <p class="keyword_user__error" style="color:red">{{ $errors->first('keyword_user.name') }}</p>
            <div class="btn-square-soft2">
                <input type="submit" value="検索する" style="color:white; font-weight:bold; font-size:20px; border;">
            </div>
        </form>
        <div class="user" text align="center">
            @if(isset($user[0]))
                <p style="margin-top:3em; font-size:20px; color:#fa8787; font-weight:bold;">検索結果</p>
                @foreach($user as $user)
                <span style="display:block; font-size:20px; margin:10px; font-weight:bold;"><a href="/user/{{$user->id}}">{{ $user->name }}</a></span>
                @endforeach
            @else
                @if($status == 1)
                <p style="margin-top:2em; color:#fa8787; font-weight:bold;">該当のユーザーが存在しません</p>
                @endif
            @endif
        </div>
    </body>
</html>
</x-app-layout>