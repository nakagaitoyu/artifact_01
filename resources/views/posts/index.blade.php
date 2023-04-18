<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
        
        <!-- Optional theme -->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

        <!-- Latest compiled and minified JavaScript -->
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    </head>
    <body>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#e0fffa;">
            <div class="bg-#ffffe6 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:white;">
                
                <div class="flex">
                    <div class='ranking' >
                        <h class="ranking_title" style="margin-bottom:16px; color:#fab387;">💗いいねが多かったアニメ(上位10位)</h>
                        @foreach($animes_counts as $animes_count)
                        <div class="anime">
                            <span style="color:green">{{ $loop->index + 1}} .</span> 
                            <a href="/anime/{{ $animes_count->id }}"  style="color:black;">{{ $animes_count->name }}(<span style="color:red">💗{{ $animes_count->count_serch}}</span>)</a>
                        </div>    
                        @endforeach
                    </div>
                    <div class='posts'>
                        @foreach ($posts as $post)
                        <div class='post1'>
                            <div class="flex">
                                <div class="image" >
                                    <h3 class='side-text' style="text-align:center; font-size:30px; ">{{ $post->user->name }}</h3>
                                    <div style="width:300px; height:300px;" class="rounded-full bg-white" >
                                        <img src="{{ $post->user->image_url }}" class="rounded-full object-contain" style="width:300px; height:300px;">  
                                    </div>
                                    
                                </div>
                                <div class="text1">
                                    <p class='body'>アニメ：<span style="color:#4169e1;" >{{ $post->anime->name }}</span> </p>
                                    <p class='body'>キャラクター：<span style="color:#4169e1">{{ $post->character->name }}</span></p>
                                    <p class='body'>歌：<span style="color:#4169e1">{{ $post->song->name }}</span></p>
                                    <p class='body'>アーティスト：<span style="color:#4169e1">{{ $post->song->artist }}</span></p>
                                </div>
                            </div>    <!--<div class="side-img" style="width:40px; display:inline-block;  vertical-align:middle;">-->
    
                            <div class="comment">
                                <div class="box26">
                                    <span class='box-title'> {{$post->user->name}}のコメント</span>
                                    <div> <span style="word-wrap:break-word; overflow-wrap:break-word;">{{ $post->review }}</span> </div>    
                                </div>
                                
                                <div class="flex" style="text-align;">
                                    @if(Auth::id() === $post->user_id)
                                    <form action="/{{$post->id}}" id="form_{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="flex" type="button" onclick="deletePost({{ $post->id }})" style="color:#ff8c00;">投稿削除</button> 
                                    </form>
                                    @endif
                                    <p class='link'>
                                        <a href="/posts/{{ $post->id }}" style="color:#6a5acd; margin:20px;">詳細画面へ　　<span style="color:black;">💗 いいね:{{ $post->likes->count()}}件</span></a>
                                    </p>     
                                </div>
                                   
                            </div>     
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class='paginate'>
                    {{ $posts->links()}}
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