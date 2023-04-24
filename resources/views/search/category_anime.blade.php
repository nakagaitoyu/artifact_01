<!DOCTYPE HTML>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>検索結果</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/category_anime_layout.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="toumei0 overflow-hidden shadow-sm sm:rounded-lg">
                    <h2 class="search_title " style="font-size:40px; font-weight:bold; a ">検索結果:{{ $anime->name }}</h2>
                    <div class='posts'>
                    @foreach ($posts as $post)
                        <div class='post'>
                            <div class="toumei">
                                <div class="flex" >
                                    <div class="image">
                                        <h3 class='side-text' style="text-align:center; font-size:30px; ">{{ $post->user->name }}</h3>
                                        <div style="width:300px; height:300px;" class="rounded-full bg-white" >
                                            <img src="{{ $post->user->image_url }}" class="rounded-full object-contain" style="width:300px; height:300px;">  
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p class='body'>アニメ：<span style="color:#801236;" >{{ $post->anime->name }}</span> </p>
                                        <p class='body'>キャラクター：<span style="color:#801236">{{ $post->character->name }}</span></p>
                                        <p class='body'>歌：<span style="color:#801236">{{ $post->song->name }}</span></p>
                                        <p class='body'>アーティスト：<span style="color:#801236">{{ $post->song->artist }}</span></p>   
                                    </div>
                                </div>
                                <div class="comment" style="margin-top:50px;">
                                    <div class="box26">
                                        <span class='box-title'>コメント</span>
                                        <p> {{ $post->review }} </p>
                                    </div>
                                    <div class="flex" style="text-align;">
                                        @if(Auth::id() === $post->user_id)
                                        <form action="/{{$post->id}}" id="form_{{ $post->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="flex" type="button" onclick="deletePost({{ $post->id }})" style="color:#ff8c00;">投稿削除</button> 
                                        </form>
                                        @endif
                                        <div class='link'>
                                            <a href="/posts/{{ $post->id }}" style="color:#6a5acd; margin:20px;">詳細画面へ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class='paginate'>
                        {{ $posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</html>
</x-app-layout>