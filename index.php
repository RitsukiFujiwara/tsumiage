<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Tsumiアゲ</title>
</head>
<body>
    <header>
        <div id="site-width">
        <h1><a href="index.php">Tsumiアゲ</a></h1>
        <nav id="top-nav">
            <ul>
            <?php
                if(empty($_SESSION['user_id'])){
            ?>
                <li><a href="signup.php" style="border:1px solid white;">新規登録</a></li>
            <?php
                }else{
            ?>
            <li><a href="#">マイページ</a></li>
            <li><a href="#">ログアウト</a></li>
            <?php
                }
            ?>
            </ul>
        </nav>
        </div>
    </header>
    <section>
      <div class ="top-picture">
        <h1>これからの積み上げを記録していきませんか？</h1>
        <input type="button" value="ログイン" id ="login_button">
        <p>積み上げを記録することでモチベーションの向上などに繋がります。</p>
      </div>
    </section>
    <footer id="footer">
      Copyright <a href="#">Tsumiアゲサポートセンター</a>. All Rights Reserved.<a href="https://stories.freepik.com/data">Illustration by Freepik Stories</a>
    </footer>
    
    <script src="js/vendor/jquery-2.2.2.min.js"></script>
    <script>
      $(function(){
        var $ftr = $('#footer');
        if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
          $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
        }
      });
    </script>
  </body>
</html>
