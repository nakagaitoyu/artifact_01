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
                        <h4 class='review_comments'>【あなたのコメント】</h4>
                        <textarea placeholder="コメントを入力してください">{{ old('post.body')}}</textarea>
                            <p>
                                <button type="button">保存する</button>
                            </p>
                                <h4 class='review_comments'>【ユーザーのコメント】</h4>
                                @foreach ($post->review_comments as $review_comment)
                                    <h5 class='review_user'>{{ $review_comment->user->name }}</h5>
                                    <p class='review_comment'>{{ $review_comment->body }}</p>
                                @endforeach
            </div>
    </body>
</html>