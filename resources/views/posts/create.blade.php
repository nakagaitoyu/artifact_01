<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>My Page</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@900&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="create">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                    <p class='user_name' style="margin:16px; font-family: 'Zen Maru Gothic', sans-serif;">あなたの名前 : <span style="font-weight:bold; font-size:20px;">{{ Auth::user()->name}}</span></p>
                    <p class='user_email' style="margin:16px; font-family: 'Zen Maru Gothic', sans-serif;">あなたのメールアドレス : <span style="font-weight:bold; font-size:20px;">{{ Auth::user()->email}}</span></p>
                    <form action="/posts/create" method="POST">
                    @csrf
                    <div class='new_anime'>
                        <p style="color:#2e6be6; margin-top:30px; margin-bottom:5px; font-weight:bold; font-family: 'Zen Maru Gothic', sans-serif;">該当のアニメがない場合はその他を選択し、新規アニメ入力欄に正式名称を入力してください。</p>
                        <p style="font-weight:bold;margin-right:160px; margin-top:30px;font-family: 'Zen Maru Gothic', sans-serif;">アニメ名</p>
                        <select class="select_anime" name="anime[name]" id="anime_select" style="border-radius:10px; width:20%; font-size:13px; font-family: 'Zen Maru Gothic', sans-serif;" >
                            <option value="" >アニメを選択してください</option>  
                            @foreach($animes as $anime)
                            <option value="{{ $anime->id }}">{{ $anime->name }}</option>
                            @endforeach
                            <option value="other">その他</option>
                        </select>
                        <p class="body__error" style="color:red ">{{ $errors->first('anime.name') }}</p>
                    </div>
                    <div class='create'>
                        <input type="text" name="new_anime[name]" id="new_input" class="c-form-text" placeholder="新規アニメ入力欄"  style="margin-top:10px;" disabled>
                        <p class='character'>
                            <p style="margin-top:30px; margin-bottom:5px; margin-right:110px;font-weight:bold; font-family: 'Zen Maru Gothic', sans-serif;">キャラクター名</p>
                            <input type="text" name="character[name]" placeholder="キャラクター名を入力してください" class="c-form-text" >
                            <p class="body__error" style="color:red">{{ $errors->first('character.name') }}</p>
                        </p>
                        <p class='song'>
                            <p style="margin-top:30px; margin-bottom:5px; margin-right:190px;font-weight:bold;font-family: 'Zen Maru Gothic', sans-serif;">曲名</p>
                            <input type="text" name="song[name]" placeholder="曲名を入力してください" class="c-form-text">
                            <p class="body__error" style="color:red">{{ $errors->first('song.name') }}</p>
                        </p>
                        <p class='song'>
                            <p style="margin-top:30px; margin-bottom:5px; margin-right:120px; font-weight:bold;font-family: 'Zen Maru Gothic', sans-serif;">アーティスト名</p>
                            <input type="text" name="song[artist]" placeholder="アーティスト名を入力してください" class="c-form-text">
                            <p class="body__error" style="color:red">{{ $errors->first('song.artist') }}</p>
                        </p>
                        <p class="review">
                            <p style="margin-top:30px; margin-bottom:5px; margin-right:330px; font-weight:bold; font-family: 'Zen Maru Gothic', sans-serif;">コメント</p>
                            <textarea type="text_body" name="post[review]" placeholder="コメントを入力してください" class="c-form-text"></textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('post.review') }}</p>
                        </p>
                            <input class="btn-square-soft1" type="submit" style="color:white"value="保存"  />
                    </div>
                </form>
            </div>
        </div>
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