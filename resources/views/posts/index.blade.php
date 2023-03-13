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
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h3 class='body'>{{ $post->user->name }}</h3>
                    <h3 class='body'>アニメ:{{ $post->anime->name }}</h3>
                        <p class='body'>・好きなキャラクター:{{ $post->character->name }}</p>
                        <p class='body'>・好きな曲:{{ $post->song->name }}</p>
                        <p class='body'>・好きなアーティスト:{{ $post->song->artist }}  </p>
                            <h4 class='review'> 【本人のコメント】</h4>
                                <p><text> {{ $post->review }} </text></p>
                                <p class='link'>
                                    <a href="/posts/{{ $post->id }}">コメント一覧を表示</a>
                                </p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links()}}
        </div>
    </body>
</html>