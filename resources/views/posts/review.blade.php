<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
        
    </head>
    <body>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p style="size:10px; color:red;">投稿一覧画面→詳細画面</p>
                <h1 class='title'>ANNECTION</h1>
                <div class='post'>
                    <div class=" inline-block align-middle" >
                        <img src="{{ $post->user->image_url }}" class="w-20 h-20 rounded-full">
                    </div>
                    <h3 class='user_name' style="display:inline-block; width:400px; margin-left:15px;">{{ $post->user->name }}</h3>
                    <h3 class='body' style="margin-right:100px;">アニメ:{{ $post->anime->name }}</h3>
                    <p class='body'>・好きなキャラクター:{{ $post->character->name }}</p>
                    <p class='body'>・好きな曲:{{ $post->song->name }}</p>
                    <p class='body'>・好きなアーティスト:{{ $post->song->artist }}  </p>
                    <h4 class='review'> 【本人のコメント】</h4>
                    <text> {{ $post->review }} </text>
                    <div>
                        <span>
                        <img src="{{asset('img/nicebutton.png')}}"  style="margin-top:50px; width:20px; ">
                         
                        <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                        @if($like)
                        <!-- 「いいね」取消用ボタンを表示 -->
                        	<a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm">
                        		いいね!
                        		<!-- 「いいね」の数を表示 -->
                        		<span class="badge">
                        			{{ $post->likes->count() }}
                        		</span>
                        	</a>
                        @else
                        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                        	<a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
                        		いいね!
                        		<!-- 「いいね」の数を表示 -->
                        		<span class="badge">
                        			{{ $post->likes->count() }}
                        		</span>
                        	</a>
                        @endif
                        </span>
                    </div>
                </div>
                <div　class="review_comment">
                    <form action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        <h4>【あなたのコメント】</h4>
                        <p>
                            <textarea name="review_comment[body]" placeholder="コメントを入力してください">{{ old('review_comment.body')}}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('review_comment.body') }}</p>
                        </p>
                        <p>
                            <input type="submit" value="保存" />
                             <a href="/posts/{{ $post->id }}"></a>
                        </p>
                    </form>
                    <h4 class=>【ユーザーのコメント】</h4>
                    @foreach ($post->review_comments as $review_comment)
                        <div class="image_url" style="width:40px; display:inline-block;  vertical-align:middle;">
                            <img src="{{ $review_comment->user->image_url }}" class="w-10 h-10 rounded-full">
                        </div>
                        <div class='user_name' style="display:inline-block; margin-left:15px;">{{ $review_comment->user->name }}</div>
                        <div class='date' style="display:inline-block; width:400px; margin-left:15px;">({{ $review_comment->created_at }})</div>
                        <div>{{ $review_comment->body }}</div>
                        @if(Auth::id() === $review_comment->user_id)
                            <form action="/posts/{{ $review_comment->id }}" id="form_{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                            </form>
                        @endif
                    @endforeach
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