<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/index_layout.css') }}">
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
        <div class="shutter">
            <div class="shutter_text"><span>A</span><span>N</span><span>N</span><span>E</span><span>C</span><span>T</span><spa>I</span><span>O</span><span>N</span></div>
        </div>
        <section class="container max-w-7xl mx-auto" style="background-color:white;">
                <div class="background overflow-hidden shadow-sm sm:rounded-lg" style="background-color:white;">
                    <div class="toumei0 overflow-hidden shadow-sm sm:rounded-lg">    
                        <div class="flex">
                            <div class='ranking' >
                                <div class="toumei1">
                                    <div class="ranking_title" >いいねが多かったアニメ(10位)</div>
                                    @foreach($animes_counts as $animes_count)
                                    <div class="ranking_text">
                                        <span style="color:#161666; font-weight:bold;">{{ $loop->index + 1}} .</span> 
                                        <a href="/anime/{{ $animes_count->id }}"  style="color:black;">{{ $animes_count->name }}(<span style="color:red">💗{{ $animes_count->count_serch}}</span>)</a>
                                    </div>    
                                    @endforeach
                                </div>
                            </div>
                            <div class='posts'>
                                @foreach ($posts as $post)
                                <div class='post1' style="background-color:white;">
                                    <div class="toumei2">
                                        <div class="flex">
                                            <div class="image" >
                                                <h3 class='side-text' style="text-align:center; font-size:30px; ">{{ $post->user->name }}</h3>
                                                <div style="width:300px; height:300px;" class="rounded-full bg-white" >
                                                    <img src="{{ $post->user->image_url }}" class="rounded-full object-contain" style="width:300px; height:300px;">  
                                                </div>
                                                
                                            </div>
                                            <div class="text1">
                                                <p class='body'>アニメ：<span style="color:#801236;">{{ $post->anime->name }}</span> </p>
                                                <p class='body'>キャラクター：<span style="color:#801236;">{{ $post->character->name }}</span></p>
                                                <p class='body'>歌：<span style="color:#801236;">{{ $post->song->name }}</span></p>
                                                <p class='body'>アーティスト：<span style="color:#801236;">{{ $post->song->artist }}</span></p>
                                            </div>
                                        </div>    <!--<div class="side-img" style="width:40px; display:inline-block;  vertical-align:middle;">-->
                
                                        <div class="comment">
                                            <div class="box26" style="margin-top:50px;">
                                                <span class='box-title'>コメント</span>
                                                <div> <span style="word-wrap:break-word; overflow-wrap:break-word;">{{ $post->review }}</span> </div>    
                                            </div>
                                            
                                            <div class="flex" style="text-align:right;">
                                                @if(Auth::id() === $post->user_id)
                                                <form action="/{{$post->id}}" id="form_{{ $post->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="flex" type="button" onclick="deletePost({{ $post->id }})" style="color:#ff8c00;">投稿削除</button> 
                                                </form>
                                                @endif
                                                <p class='link'>
                                                    <a href="/posts/{{ $post->id }}" style="color:#a16e00; margin:20px;">詳細画面へ</a>
                                                </p>
                                                <p><span style="margin-left:20px; color:red;">💗 いいね</span>:{{ $post->likes->count()}}件</p>
                                                <p><span style="margin-left:20px; color:#003300;">コメント</span>:{{ $post->review_comments->count() }}件</p>
                                            </div>
                                               
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
            </div>
        </section>
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