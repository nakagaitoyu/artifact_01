<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/review_layout.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="baseball overflow-hidden shadow-sm sm:rounded-lg">
                <div class="toumei0 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class='post2'>
                        <div class='toumei3'>
                            <div class="flex">
                                <div class="image">
                                    <h3 class='side-text' style="text-align:center; font-size:30px; ">{{ $post->user->name }}</h3>
                                    <div style="width:300px; height:300px;" class="rounded-full bg-white" >
                                        <img src="{{ $post->user->image_url }}" class="rounded-full object-contain" style="width:300px; height:300px;">
                                    </div>
                                </div>
                                <div class="text2">
                                    <p class='body'>アニメ：<span style="color:#801236;" >{{ $post->anime->name }}</span> </p>
                                    <p class='body'>キャラクター：<span style="color:#801236;">{{ $post->character->name }}</span></p>
                                    <p class='body'>歌：<span style="color:#801236;">{{ $post->song->name }}</span></p>
                                    <p class='body'>アーティスト：<span style="color:#801236;">{{ $post->song->artist }}</span></p> 
                                </div>
                            </div>
                        
                            <div class="comment">
                                <div class="box26" style="margin-top:50px;">
                                    <span class='box-title'>コメント</span>
                                    <p style="word-wrap:break-word; overflow-wrap:break-word;"> {{ $post->review }} </p>    
                                </div>
                            </div>
                            <div class='flex' style='text-align:center;'>
                                <img src="{{asset('img/nicebutton.png')}}"  style="width:30px; ">
                                 
                                <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                                @if($like)
                                <!-- 「いいね」取消用ボタンを表示 -->
                                	<a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm"　style="color:red; text-align:center;">
                                		いいね!
                                		<!-- 「いいね」の数を表示 -->
                                		<span class="badge">
                                			{{ $post->likes->count() }}
                                		</span>
                                	</a>
                                @else
                                <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                                	<a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm"　style="color:red; text-align:center;">
                                		いいね!
                                		<!-- 「いいね」の数を表示 -->
                                		<span class="badge">
                                			{{ $post->likes->count() }}
                                		</span>
                                	</a>
                                @endif
                            </div>
                        </div>  
                    </div>
                    
                    <div class="review_comments_box m-10" >
                        <div  class="review_comments_title"  >ユーザーのコメント</div>
                        <div>
                            <form action="/posts/{{$post->id}}" method="POST">
                                @csrf
                                <p>
                                    <textarea name="review_comment[body]"  placeholder="コメントを入力してください" >{{ old('review_comment.body')}}</textarea>
                                    <p class="body__error" style="color:red">{{ $errors->first('review_comment.body') }}</p>
                                </p>
                                <p>
                                    <input class="submit_button" type="submit" value="保存" />
                                     <a href="/posts/{{ $post->id }}"></a>
                                </p>
                            </form>
                        </div>
                        <div class="review_commments">
                            <div class="toumei4">    
                                @foreach ($post->review_comments as $review_comment)
                                <div>
                                    <div class="flex" style="margin-top:40px; margin-left:25px;">
                                        <div class="rounded-full" style="width:60px; height:60px;">
                                            <img src="{{ $review_comment->user->image_url }}" class="rounded-full object-contain" style="width:60px; height:60px; background-color:white;">
                                        </div> 
                                        <div style="margin-left:10px;">
                                            <p><span style="font-size:13px; font-color:#393f4c; font-family: 'Noto Sans JP', sans-serif;">{{ $review_comment->user->name }}</span> <span style="color:red; font-size:13px;">({{ $review_comment->created_at }})</span></p>
                                            <p class="review_body" style=" color:#003300; font-size:16px; word-wrap:break-word; overflow-wrap:break-word; font-family: 'Noto Sans JP', sans-serif; font-weight:bold">{{ $review_comment->body }}</p>
                                        </div>
                                    </div>
                                    @if(Auth::id() === $review_comment->user_id)
                                        <form action="/posts/{{ $review_comment->id }}" id="form_{{ $post->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="deletePost({{ $post->id }})" style="color:red; margin-left:69px; font-size:13px; font-family: 'Zen Maru Gothic', sans-serif;">コメントを削除</button> 
                                        </form>
                                    @endif    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </body>
    <script>
        function deletePost(id)
        {
            'use strict'
            if (confirm('削除すると復元できません。\本当に削除しますか？'))
            {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</html>
</x-app-layout>