<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>My Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body>
            <p class='user_name'>あなたの名前 : {{ Auth::user()->name}}</p>
            <p class='user_email'>あなたのメールアドレス : {{ Auth::user()->email}}</p>
            <form action="/posts/create" method="POST">
            @csrf
                <p class='anime'>
                    <p>該当のアニメがない場合はその他を選択し、以下に正式名称を入力してください。</p>
                    <select name="anime[name]" id="anime_select" >
                        <option value="" >アニメを選択してください</option>  
                        @foreach($animes as $anime)
                            <option value="{{ $anime->id }}">{{ $anime->name }}</option>
                        @endforeach
                        <option value="other">その他</option>
                    </select>
                    <p class="body__error" style="color:red">{{ $errors->first('anime.name') }}</p>
                </p>
                
                <p>新規アニメ</p>
                <input type="text" name="new_anime[name]" id="new_input" disabled>
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
        </div>
    <script>
        let new_input = document.getElementById('new_input');
        function selectChange(event){
            let value=event.currentTarget.value;
            if(value=="other"){
                new_input.disabled=false;
            }else{
                new_input.disabled=true;
            }
        }
        let select = document.getElementById("anime_select");
        select.addEventListener('change',selectChange);
    </script>
    </body>
</html>
</x-app-layout>