<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>仮タイトル</h1>
        <div class='post'>
            <h3 class='body'>{{ $post->user->name }}</h3>
            <h3 class='body'>アニメ:{{ $post->anime->name }}</h3>
                <p class='body'>・好きなキャラクター:{{ $post->character->name }}</p>
                <p class='body'>・好きな曲:{{ $post->song->name }}</p>
                <p class='body'>・好きなアーティスト:{{ $post->song->artist }}  </p>
                    <h4 class='review'> 【本人のコメント】</h4>
                        <text> {{ $post->review }} </text>
                            <form action="/posts/{{$post->id}}" method="POST">
                                    @csrf
                                    <h4 class='review_comment'>【あなたのコメント】</h4>
                                        <p>
                                            <textarea name="review_comment[body]" placeholder="コメントを入力してください">{{ old('review_comment.body')}}</textarea>
                                            <p class="body__error" style="color:red">{{ $errors->first('review_comment.body') }}</p>
                                        </p>
                                        <p>
                                            <input type="submit" value="保存" />
                                             <a href="/posts/{{ $post->id }}"></a>
                                        </p>
                            </form>
                    <h4 class='review_comments'>【ユーザーのコメント】</h4>
                        @foreach ($post->review_comments as $review_comment)
                        　　<p class='user_name'>{{ $review_comment->user->name }}</p>
                            <p class='review_comment'>{{ $review_comment->body }}</p>
                                @if(Auth::id() === $review_comment->user_id)
                                    <form action="/posts/{{ $review_comment->id }}" id="form_{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                                    </form>
                                @endif
                        @endforeach
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