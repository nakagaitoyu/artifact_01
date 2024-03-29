HTML CSSResult Skip Results Iframe
EDIT ON
<!DOCTYPE html>
<html lang="jp">
<head>
    <title>ユーザー登録</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
           <div class="row">
                    <h1>ユーザー登録</h1>
            </div>
        </header>
    </div>

    <hr>
    
    <div class="container">
        <form action="＃" method="get" class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <label for="name"><span class="label label-danger">必須</span> お名前</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="例：ジャングル オーシャン" autofocus required>
                </div>
                <div class="form-group">
                    <label for="email"><span class="label label-danger">必須</span> メールアドレス</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="例：raffaello@jungleocean.com" required>
                </div>
                <div class="form-group">
                    <label for="tel"><span class="label label-danger">必須</span> 電話番号</label>
                    <input type="tel" id="tel" name="tel" class="form-control" placeholder="例：080-1234-5678" required>
                </div>
                <div class="form-group">
                    <label><span class="label label-danger">必須</span> 性別</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="male" value="1" required>男性
                        </label>
                    
                        <label class="radio-inline">
                            <input type="radio" name="female" value="2" required>女性
                        </label>
                    
                        <label class="radio-inline">
                            <input type="radio" name="not applicable" value="9" required>その他
                        </label>
                    </div>
                </div>
              
                
                <div class="form-group">
                    <label for="job"><span class="label label-success">任意</span> あなたが目指している職業</label>
                    <select id="job" name="job" class="form-control">
                       <option value="">選択してください</option>
                        <option value="Webデザイナー">Webデザイナー</option>
                        <option value="Webディレクター">Webディレクター</option>
                        <option value="フロントエンドエンジニア">フロントエンドエンジニア</option>
                        <option value="バックエンドエンジニア">バックエンドエンジニア</option>
                        <option value="ゴリラ">ゴリラ</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><span class="label label-success">任意</span> あなたが学びたいこと（複数選択可）</label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="デザイン">デザインについて
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="プログラミング">プログラミングについて
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="マーケティング">マーケティングについて
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="q1_html" name="q1" value="バナナ">バナナについて
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">送信する</button>
            </div>
        </form>
    </div>

    <hr>

    <div class="container">
        <footer>
            <p>&copy; JungleOcean.</p>
        </footer>
    </div>
</body>
</html>