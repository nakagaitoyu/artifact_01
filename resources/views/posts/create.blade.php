<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>My Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>仮タイトル</h1>
        <p class='user_name'>あなたの名前 : {{ Auth::user()->name}}</p>
        <p class='user_email'>あなたのメールアドレス : {{ Auth::user()->email}}</p>
            <form action="/posts/create" method="POST">
            @csrf
                <p class='anime'>
                    <textarea name="anime[name]" placeholder="アニメ名を入力してください">{{ old('anime.name')}}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('anime.name') }}</p>
                </p>
                <p class='character'>
                    <textarea name="character[name]" placeholder="キャラクター名を入力してください">{{ old('character.name')}}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('character.name') }}</p>
                </p>
                <p class='song'>
                    <textarea name="song[name]" placeholder="曲名を入力してください">{{ old('song.name')}}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('song.name') }}</p>
                </p>
                <p class='song'>
                    <textarea name="song[artist]" placeholder="アーティスト名を入力してください">{{ old('song.artist')}}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('song.artist') }}</p>
                </p>
                <p class="review">
                    <textarea name="post[review]" placeholder="コメントを入力してください">{{ old('post.review')}}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.review') }}</p>
                </p>
                <input type="submit" value="保存" />
                </p>
            </form>
    </body>
</html>