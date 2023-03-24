<!DOCTYPE HTML>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>検索結果</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    </head>
    <body>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="title">ANNECTION</h1>
                <div class='posts'>
                    <h2 class="検索結果" style="font-size:40px">検索結果</h2>
                    @foreach ($posts as $post)
                        <div class='post'>
                            <div class=" inline-block align-middle" >
                                <img src="{{ $post->user->image_url }}" class="w-20 h-20 rounded-full">
                            </div>
                            <h3 class='body' style="display:inline-block; width:400px; margin-left:15px;">{{ $post->user->name }}</h3>
                            <h3 class='body'>アニメ:{{ $post->anime->name }}</h3>
                            <p class='body'>好きなキャラクター:{{ $post->character->name }}</p>
                            <p class='body'>好きな曲:{{ $post->song->name }}</p>
                            <p class='body'>好きなアーティスト:{{ $post->song->artist }}  </p>
                            <h4 class='review'> 【{{ $post->user->name}}のコメント】</h4>
                            <p><text> {{ $post->review }} </text></p>
                            @if(Auth::id() === $post->user_id)
                                <form action="/{{$post->id}}" id="form_{{ $post->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                                </form>
                            @endif
                            <p class='link'>
                                <a href="/posts/{{ $post->id }}" style="color:blue">コメント一覧を表示</a>
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
</html>
</x-app-layout>