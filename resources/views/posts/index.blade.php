<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    </head>
    <body>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class='title'>ANNECTION</h1>
                <div class='posts'>
                    @foreach ($posts as $post)
                    <div class='post'>
                        <div class="side-img" style="width:40px; display:inline-block;  vertical-align:middle;">
                            <img src="{{ $post->user->image_url }}" style="border-radius:500px; width:100%">
                        </div>
                        <h3 class='side-text' style="display:inline-block; width:400px; margin-left:15px;">{{ $post->user->name }}</h3>
                        <h3 class='body'>アニメ:{{ $post->anime->name }}</h3>
                        <p class='body'>・好きなキャラクター:{{ $post->character->name }}</p>
                        <p class='body'>・好きな曲:{{ $post->song->name }}</p>
                        <p class='body'>・好きなアーティスト:{{ $post->song->artist }}  </p>
                        <h4 class='review'> 【本人のコメント】</h4>
                        <p><text> {{ $post->review }} </text></p>
                        @if(Auth::id() === $post->user_id)
                            <form action="/{{$post->id}}" id="form_{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                            </form>
                        @endif
                        <p class='link'>
                            <a href="/posts/{{ $post->id }}">コメント一覧を表示</a>
                        </p>
                    </div>
                    @endforeach
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